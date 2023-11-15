function modificar(){
  cargar_habitacion_modi()
}
function alta(){
  cargar_habitacion()
}
let header = document.querySelector("header");
let menu = document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");

window.addEventListener("scroll", () => {
  header.classList.toggle("shadow", window.scrollY > 0);
});

menu.onclick = () => {
  navbar.classList.toggle("active");
};
window.onscroll = () => {
  navbar.classList.remove("active");
};

// Dark Mode / light mode
let darkmode = document.querySelector("#darkmode");

darkmode.onclick = () => {
  if (darkmode.classList.contains("bx-moon")) {
    darkmode.classList.replace("bx-moon", "bx-sun");
    document.body.classList.add("active");
  } else {
    darkmode.classList.replace("bx-sun", "bx-moon");
    document.body.classList.remove("active");
  }
};

function visible(userType) {
  //alert('tipo: ' + userType);
  if (userType === "Empleado") {
      var imagenesTab = document.querySelector(".services-box");
      imagenesTab.style.display = "flex";
  }
}             
function cargar_habitacion_modi() {
  var request = $.ajax({
      url: "../habitacion/habitacion_select.php",
      data: {
      },
      success: function(respuestaDelServer,estado) {
      // alert(respuestaDelServer,estado);
      //  alert("hola");
          var habitaciones = new Array();
          objJson=JSON.parse(respuestaDelServer);
          objJson.planes.forEach(element => {
            if(element.id != document.getElementById('tipo').value){
              habitaciones.push(element.id+"|"+element.descripcion);
            }
        });//cierra for each
        habitaciones.sort();
        //alert(habitaciones);
      addOptions("habitacion", habitaciones);
      }//cierra funcion asignada al success
  });//cierra ajax
}
function cargar_habitacion() {
  var request = $.ajax({
      url: "../habitacion/habitacion_select.php",
      data: {
      },
      success: function(respuestaDelServer,estado) {
      // alert(respuestaDelServer,estado);
      //  alert("hola");
          var habitaciones = new Array();
          objJson=JSON.parse(respuestaDelServer);
          objJson.planes.forEach(element => {
              habitaciones.push(element.id+"|"+element.descripcion);
        });//cierra for each
        habitaciones.sort();
        //alert(habitaciones);
      addOptions("habitacion", habitaciones);
      }//cierra funcion asignada al success
  });//cierra ajax
}
// Rutina para agregar opciones a un <select>
function addOptions(domElement, array) {
var select = document.getElementById(domElement);

  for (value in array) {
    var option = document.createElement("option");
          let todo=array[value].split('|');
          option.text = todo[1];
          option.setAttribute("value",todo[0]);
        if(option.text != 'null' && option.text != null && option.text != ""){
          select.add(option);
        }
  }
}