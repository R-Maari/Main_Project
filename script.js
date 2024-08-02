// document.addEventListener("DOMContentLoaded", function() {
//     if (navigator.geolocation) {
//       navigator.geolocation.getCurrentPosition(success, error, {
//         maximumAge: 0
//       });
//     } else {
//       console.log("Geolocation is not supported ");
//     }
//   });
  
//   function success(position) {
//     const latitude = position.coords.latitude;
//     const longitude = position.coords.longitude;
    
//     console.log(`Latitude: ${latitude}`);
//     console.log(`Longitude: ${longitude}`);
    
//     const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}&zoom=18&addressdetails=1`;
//     const headers = {
//       'User-Agent': 'YourApp/1.0'
//     };
  
//     fetch(url, { headers })
//       .then(response => {
//         if (!response.ok) {
//           throw new Error(`HTTP error! status: ${response.status}`);
//         } else {
//           return response.json();
//         }
//       })
//       .then(data => {
//         console.log(`Location Details:`);
//         console.log(`Address: ${data.display_name}`);
//         console.log(`City: ${data.address.city}`);
//         console.log(`State: ${data.address.state}`);
//         console.log(`Country: ${data.address.country}`);
//         console.log(`Postal Code: ${data.address.postcode}`);
        
//         if (data.address.city === "Bangalore" || data.address.state === "Karnataka") {
//           updateLinkStyles("nec-link", "auto", "none", 1);
//           updateLinkStyles("ttc-link", "none", "auto", 0.5);
//         } else if (data.address.state === "Kerala") {
//           updateLinkStyles("nec-link", "none", "auto", 1);
//           updateLinkStyles("ttc-link", "auto", "none", 0.5);
//         } else {
//           updateLinkStyles("nec-link", "none", "none", 0.5);
//           updateLinkStyles("ttc-link", "none", "none", 0.5);
//         }
//       })
//       .catch(error => console.error('Error:', error));
//   }
  
//   function updateLinkStyles(id, pointerEvents, pointerEvents2, opacity) {
//     const link = document.getElementById(id);
//     if (link) {
//       link.style.pointerEvents = pointerEvents;
//       link.style.opacity = opacity;
//     } else {
//       console.log(`Element with ID ${id} not found`);
//     }
//   }
  
//   function error(err) {
//     console.warn(`ERROR(${err.code}): ${err.message}`);
//     updateLinkStyles("nec-link", "none", "none", 0.5);
//     updateLinkStyles("ttc-link", "none", "none", 0.5);
//   }