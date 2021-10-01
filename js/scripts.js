feather.replace();
/* */
var accountToggleIn = document.querySelectorAll('.accountToggle'),
asideMobile = document.querySelector('aside.account');

for(var i = 0; i < accountToggleIn.length; i++){
  accountToggleIn[i].addEventListener('click', menuAction);
}

function menuAction(){
if(asideMobile.classList.contains('hide')){
    asideMobile.classList.remove('hide');
}else{
    asideMobile.classList.add('hide')
}
}

/* */
let map = L.map('map').setView([41.881832, -87.623177], 12);

L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/dark-v10/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiZ2Fkemlrb2RvOTkiLCJhIjoiY2tzcmp0NzBqMDAxazJvczBidm5tbThuMyJ9.p4xCY1sCswTLYGaXvwImYw'
}).addTo(map);

fetch("https://data.cityofchicago.org/resource/ijzp-q8t2.json?primary_type=NARCOTICS&$where=date>=%20%272021-01-01T12:00:00%27&$limit=5000")
  .then(res => res.json())
  .then(data => {
    data.forEach(arrest => {
      let date = new Date(arrest["date"]).toLocaleDateString();
      let address = arrest["block"];
      let description = arrest["description"];
      let lat = arrest["location"]["latitude"];
      let long = arrest["location"]["longitude"];
      let color;

      if (description.includes("CANNABIS")) {
        color = "#4cbb17";
      } else if (description.includes("COCAINE")) {
        color = "#ffffff";
      } else if (description.includes("CRACK")) {
        color = "#3b5998";
      } else if (description.includes("HEROIN")) {
        color = "#d22b2b";
      } else if (description.includes("PCP")) {
        color = "#ffea00";
      } else if (description.includes("AMPHETAMINES") || description.includes("METH")) {
        color = "#9f2b68";
      }
      
      let desc = `Date: ${date} <br> Location: ${address} <br> Description: ${description}`;

      // create a circle
      const circle = L.circle([lat, long], {
        color: 'transparent',
        fillColor: color,
        fillOpacity: 0.5,
        weight: 1,
        radius: 20
      }).addTo(map).bindPopup(desc);
    })
  })

/* */
if (window.matchMedia("(min-width: 780px)").matches){
	alert('Desenvolvido apenas para mobile!');
}