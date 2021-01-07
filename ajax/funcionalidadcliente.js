ultimoCodigo();

function ultimoCodigo() {
  let opcion = 1;
  //alert(opcion);
  $.post(
    "../controlador/clienteControlador.php",
    { opcion },
    function (response) {
      // console.log(response);
      console.log(response);
      let respuesta = JSON.parse(response);
      //    alert(response);
      console.log(respuesta);
      if (respuesta.length == 0) {
        $("#codigoClie").val("00000000");
      } else {
        let cadena = respuesta[0].codigo; //cadena sera el resultado del codigo extraido de la base de datos
        console.log(cadena);
        let subcadena = "";
        for (let i = 2; i <= 10; i++) {
          subcadena += cadena.charAt(i);
          //console.log(i);
        }
        $("#codigoClie").val(subcadena.toUpperCase());
      }
    }
  );
}

//Cambia el valor del codigo segun sean las iniciales del cliente
let comment1 = document.getElementById("nombreCli");
let timeout1;
comment1.addEventListener("keydown", () => {
  clearTimeout(timeout1);
  timeout1 = setTimeout(() => {
    //contenido
    //Extraer iniciales
    let opcion1 = 1;
    $.post(
      "../controlador/clienteControlador.php",
      { opcion1 },
      function (response) {
        console.log(response);
        let respuesta = JSON.parse(response);
        // alert(response);
        console.log(respuesta);
        if (respuesta.length == 0) {
          //  $("#codigoClie").val("0000000000");
          let subcadena1 = "00000000";

          // alert(subcadena1);
          let persona = $("#tipoClie").val();

          if (persona == "natural") {
            inicialesNatural1(subcadena1);
          } else {
            inicialesJuridico1(subcadena1);
          }
        } else {
          let cadena1 = respuesta[0].codigo; //cadena sera el resultado del codigo extraido de la base de datos
          console.log(cadena1);
          let subcadena1 = "";
          for (let i = 2; i <= 10; i++) {
            subcadena1 += cadena1.charAt(i);
            //console.log(i);
          }
          $("#codigoClie").val(subcadena1);
          let persona = $("#tipoClie").val();
           if (persona == "natural") {
            inicialesNatural(subcadena1);
          } else {
            inicialesJuridico(subcadena1);
          }
        }
      }
    );

    clearTimeout(timeout1);
  }, 1000);
});

function inicialesJuridico1(subcadena1) {
  let codigoAnterior = subcadena1,
    cadena = $("#nombreCli").val(),
    separador = " ", // un espacio en blanco
    arregloDeSubCadenas = cadena.split(separador); // SEPARA EL NOMBRE EN CADENAS INDIVIDUALES

  subcadena =
    arregloDeSubCadenas[0].substring(0, 1) +
    arregloDeSubCadenas[1].substring(0, 1);
  subcadena = subcadena.toUpperCase();
  //capturar el  numero de zeros

  j = 7;

  let suma = 1;

  switch (j) {
    case 0:
      $("#codigoClie").val(subcadena + suma);
      break;
    case 1:
      $("#codigoClie").val(subcadena + "0" + suma);
      break;
    case 2:
      $("#codigoClie").val(subcadena + "00" + suma);
      break;
    case 3:
      $("#codigoClie").val(subcadena + "000" + suma);
      break;
    case 4:
      $("#codigoClie").val(subcadena + "0000" + suma);
      break;
    case 5:
      $("#codigoClie").val(subcadena + "00000" + suma);
      break;
    case 6:
      $("#codigoClie").val(subcadena + "000000" + suma);
      break;
    default:
      $("#codigoClie").val(subcadena + "0000000" + suma);
      break;
  }
}

function inicialesNatural1(subcadena1) {
  let codigoAnterior = subcadena1,
    cadena = $("#nombreCli").val(),
    separador = " ", // un espacio en blanco
    arregloDeSubCadenas = cadena.split(separador); // SEPARA EL NOMBRE EN CADENAS INDIVIDUALES

  subcadena =
    arregloDeSubCadenas[2].substring(0, 1) +
    arregloDeSubCadenas[3].substring(0, 1);
  subcadena = subcadena.toUpperCase();

  //capturar el  numero de zeros

  let j = 7;
  let suma = 1;

  switch (j) {
    case 0:
      $("#codigoClie").val(subcadena + suma);
      break;
    case 1:
      $("#codigoClie").val(subcadena + "0" + suma);
      break;
    case 2:
      $("#codigoClie").val(subcadena + "00" + suma);
      break;
    case 3:
      $("#codigoClie").val(subcadena + "000" + suma);
      break;
    case 4:
      $("#codigoClie").val(subcadena + "0000" + suma);
      break;
    case 5:
      $("#codigoClie").val(subcadena + "00000" + suma);
      break;
    case 6:
      $("#codigoClie").val(subcadena + "000000" + suma);
      break;
    default:
      $("#codigoClie").val(subcadena + "0000000" + suma);
      break;
  }
}

function inicialesJuridico(subcadena1) {
  let codigoAnterior = subcadena1,
    cadena = $("#nombreCli").val(),
    separador = " ", // un espacio en blanco
    arregloDeSubCadenas = cadena.split(separador); // SEPARA EL NOMBRE EN CADENAS INDIVIDUALES

  subcadena =
    arregloDeSubCadenas[0].substring(0, 1) +
    arregloDeSubCadenas[1].substring(0, 1);
  subcadena = subcadena.toUpperCase();
  //capturar el  numero de zeros

  let i = 2;
  while (codigoAnterior.charAt(i) == 0) {
    i++;
  }

  let j = i;
  let val = 10;
  let resultadooo = "";
  while (j < val) {
    resultadooo += codigoAnterior.charAt(j);
    j++;
  }
  let suma = parseInt(resultadooo, 10) + 1;

  switch (j) {
    case 0:
      $("#codigoClie").val(subcadena + suma);
      break;
    case 1:
      $("#codigoClie").val(subcadena + "0" + suma);
      break;
    case 2:
      $("#codigoClie").val(subcadena + "00" + suma);
      break;
    case 3:
      $("#codigoClie").val(subcadena + "000" + suma);
      break;
    case 4:
      $("#codigoClie").val(subcadena + "0000" + suma);
      break;
    case 5:
      $("#codigoClie").val(subcadena + "00000" + suma);
      break;
    case 6:
      $("#codigoClie").val(subcadena + "000000" + suma);
      break;
    default:
      $("#codigoClie").val(subcadena + "0000000" + suma);
      break;
  }
}

function inicialesNatural(subcadena1) {
  let codigoAnterior = subcadena1,
    cadena = $("#nombreCli").val(),
    separador = " ", // un espacio en blanco
    arregloDeSubCadenas = cadena.split(separador); // SEPARA EL NOMBRE EN CADENAS INDIVIDUALES

  subcadena =
    arregloDeSubCadenas[2].substring(0, 1) +
    arregloDeSubCadenas[3].substring(0, 1);
  subcadena = subcadena.toUpperCase();

  //capturar el  numero de zeros

  let i = 2;
  while (codigoAnterior.charAt(i) == 0) {
    i++;
  }

  let j = i;
  let val = 10;
  let resultadooo = "";
  while (j < val) {
    resultadooo += codigoAnterior.charAt(j);
    j++;
  }
  let suma = parseInt(resultadooo, 10) + 1;

  switch (j) {
    case 0:
      $("#codigoClie").val(subcadena + suma);
      break;
    case 1:
      $("#codigoClie").val(subcadena + "0" + suma);
      break;
    case 2:
      $("#codigoClie").val(subcadena + "00" + suma);
      break;
    case 3:
      $("#codigoClie").val(subcadena + "000" + suma);
      break;
    case 4:
      $("#codigoClie").val(subcadena + "0000" + suma);
      break;
    case 5:
      $("#codigoClie").val(subcadena + "00000" + suma);
      break;
    case 6:
      $("#codigoClie").val(subcadena + "000000" + suma);
      break;
    default:
      $("#codigoClie").val(subcadena + "0000000" + suma);
      break;
  }
}

const selectElement = document.querySelector(".tipo");

selectElement.addEventListener("change", (event) => {
  const resultado = event.target.value;
  //alert(resultado);

  let a = document.getElementById("duinatural");
  let b = document.getElementById("lugarTrabajo");
  let c = document.getElementById("sueldoNat");
  let d = document.getElementById("gastoNat");
  let e = document.getElementById("estadoCivilnat");
  let x = document.getElementById("estadoResultado");
  let y = document.getElementById("balanceGeneral");
  let z = document.getElementById("grafica");

  if (resultado == "") {
    a.style.display = "";
    b.style.display = "";
    c.style.display = "";
    d.style.display = "";
    e.style.display = "";
    x.style.display = "";
    y.style.display = "";
    z.style.display = "";
  } else {
    if (resultado == "natural") {
      z.style.display = "";
      a.style.display = "";
      b.style.display = "";
      c.style.display = "";
      d.style.display = "";
      e.style.display = "";
      x.style.display = "none";
      y.style.display = "none";
    } else {
      x.style.display = "block";
      y.style.display = "block";
      z.style.display = "none";
      a.style.display = "none";
      b.style.display = "none";
      c.style.display = "none";
      d.style.display = "none";
      e.style.display = "none";
    }
  }
});

let comment = document.getElementById("gastosClie");
let timeout;

//El evento lo puedes reemplazar con keyup, keypress y el tiempo a tu necesidad
comment.addEventListener("keydown", () => {
  clearTimeout(timeout);
  timeout = setTimeout(() => {
    // alert("esta escribiendo");

    let ingresos = $("#sueldoClie").val();
    let gastos = $("#gastosClie").val();

    Morris.Bar({
      element: "graph",
      data: [
        { x: "Ingresos ", y: ingresos },
        { x: "Egresos ", y: gastos },
      ],
      xkey: "x",
      ykeys: ["y"],
      labels: ["$"],
      barColors: function (row, series, type) {
        if (type === "bar") {
          return "rgb(38, 185, 154)";
        } else {
          return "#000";
        }
      },
    });
    clearTimeout(timeout);
  }, 1000);
});
