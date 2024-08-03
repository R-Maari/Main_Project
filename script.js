// // Disable right-click context menu
// document.addEventListener('contextmenu', function(e) {
//     e.preventDefault();
//     alert("diabled");
// });





//student.html

    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const images = document.querySelectorAll('#image-slider .slider-image');
        const totalImages = images.length;

        function showImage(index) {
            images.forEach((img, i) => {
                img.classList.remove('active');
                if (i === index) {
                    img.classList.add('active');
                }
            });
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % totalImages;
            showImage(currentIndex);
        }

        // Initially show the first image
        showImage(currentIndex);

        // Change image every 3 seconds (3000 milliseconds)
        setInterval(nextImage, 3000);
    });
