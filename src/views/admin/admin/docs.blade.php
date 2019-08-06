@extends('manager::layouts.admin')

@section('content')
  <div class="container-fluid p-3">
    <div class="card mb-2">
      <div class="card-body d-sm-flex justify-content-between text-center">
        <h1 class="mb-2 mb-sm-0 pt-1">Documentación</h1>
      </div>
    </div>
    <div class="card card-hover">
      <div class="card-body">
        <div class="card-deck">
          <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/GYzda7Ihg4k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <h2 class="card-title">Crear producto :</h2>
              <p class="card-text">
                Click en productos -> símbolo “+” al lado derecho del administrador ->
                Digitar nombre del producto -> Llenar datos del formulario definiendo
                descripción, tipo de producto, link del pdf, si el producto será destacado
                o no y seleccionando la imagen que se mostrará -> click en Guardar.
              </p>
            </div>
          </div>
          <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ARNbdYEApDY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <h2 class="card-title">Eliminación de un producto :</h2>
              <p class="card-text">
                Ingresar a la pestaña de productos -> seleccionar el producto a eliminar ->
                click en el botón “Eliminar”, confirmar la eliminación del producto.
              </p>
            </div>
          </div>
          <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/hXpEPk2_D8Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <h2 class="card-title">Crear páginas estáticas :</h2>
              <p class="card-text">
                Ingresar a la pestaña de páginas → seleccionar el simbolo “+” al
                lado derecho del administrador  → digitar el nombre de la nueva página →
                llenar los campos solicitados → click en el botón de guardar.<br><br>
                <strong>Nota: </strong>Para que la página se muestre es necesario crear un enlace que
                redirija a dicha página (crear enlaces slide 234234).
              </p>
            </div>
          </div>
        </div>

        <div class="card-deck">
          <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/bKKsWbN4VXQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <h2 class="card-title">Eliminar y editar páginas estáticas :</h2>
              <p class="card-text">
                Ingresar a la pestaña de páginas → seleccionar la página a eliminar o editar  →
                En caso de ser edición, cambiar los campos requeridos y click en guardar; en caso
                de ser eliminar, click en elimianar y confirmar la eliminación.
              </p>
            </div>
          </div>
          <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/N3eTTxJBv44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <h2 class="card-title">Registro de localizaciones :</h2>
              <p class="card-text">
                Ingresar a la pestaña de localizaciones → digitar el nombre de la nueva localización →
                seleccionar el tipo de localización y llenar el resto de campos solicitados →
                click en el botón de guardar.
              </p>
            </div>
          </div>
          <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/bKKsWbN4VXQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <h2 class="card-title">Eliminación y edición de localizaciones :</h2>
              <p class="card-text">
                Ingresar a la pestaña de localizaciones → seleccionar la localizacion a eliminar o editar →
                en caso de editar, luego de cambiar los datos requeridos hacer click en guardar; en caso
                de eliminar, hacer click en eliminar y confirmar la eliminación.
              </p>
            </div>
          </div>
        </div>

        <div class="card-deck">
          <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/EJ9fUNGi9dU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <h2 class="card-title">Registro de artículos :</h2>
              <p class="card-text">
                Ingresar a la pestaña de Artículos → digitar el nombre del nuevo artículo → llenar el resto de
                campos solicitados → click en el botón de guardar.<br><br>
                <strong>Nota: </strong>Tener en cuenta que dependiendo el tipo de articulo seleccionado aparecerá en el sitio.
                Explicación detallada en la siguiente diapositiva.
              </p>
            </div>
          </div>
          <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/uO_hysOIYGs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <h2 class="card-title">Tipos de artículo a detalle :</h2>
              <p class="card-text">
                El tipo de articulo define en qué página del sitio aparecerá. Si se selecciona “Obras”, el artículo aparecerá
                en el enlace de actualidad → últimas obras; si se selecciona “Noticias”, el artículo aparecerá en actualidad
                → Noticias Holcim; al seleccionar “Tips”, aparecerá en soluciones Holcim → cemento o concreto → Tips Holcim;
                al seleccionar “Lealtad”, el artículo se mostrará en experiencias con el cliente → Fomentando lealtad; al
                seleccionar “Eventos”, el artículo aparecerá en experiencias con el cliente → eventos y momentos especiales;
                finalmente si seleccionamos “Academia”, el artículo se mostrará en el enlace Soluciones Holcim → cemento o
                concreto → Academia Holcim. En el siguiente slide se muestra un ejemplo.
              </p>
            </div>
          </div>
          <div class="card mb-3">
              <img src="https://via.placeholder.com/560x315?text=No+Video" class="card-img-top" alt="img_demo">
            <div class="card-body">
              <h2 class="card-title">Eliminación y edición de artículos:</h2>
              <p class="card-text">
                Ingresar a la pestaña de artículos → seleccionar el artículo a eliminar o editar → en caso de editar, luego
                de cambiar los datos requeridos hacer click en guardar; en caso de eliminar, hacer click en el botón Eliminar
                y confirmar la eliminación.
              </p>
            </div>
          </div>
        </div>

        <div class="card-deck">
          <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/BrwapIjnv3Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <h2 class="card-title">Registro de categorías :</h2>
              <p class="card-text">
                Ingresar a la pestaña de Categorías → hacer click en el simbolo “+” que aparece a la derecha del
                administrador  → digitar el nombre de la nueva categoría → llenar el resto de campos solicitados
                → click en el botón de guardar. En caso de querer eliminar una categoría, se selecciona dicha
                categoría y click en el botón de Eliminar, confirmar eliminación. <br><br>
                <strong>Nota: </strong>Las categorías se verán reflejadas en el select “tipo de artículo” al crear un nuevo artículo.
              </p>
            </div>
          </div>
          <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/bKKsWbN4VXQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <h2 class="card-title">Eliminar y editar páginas estáticas :</h2>
              <p class="card-text">
                Ingresar a la pestaña de páginas → seleccionar la página a eliminar o editar  → En caso de ser edición,
                cambiar los campos requeridos y click en guardar; en caso de ser eliminar, click en elimianar y
                confirmar la eliminación.
              </p>
            </div>
          </div>
          <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/4KkdbL71TR8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <h2 class="card-title">Enlaces :</h2>
              <ul>
                <li>Para agregar un nuevo enlace, se debe ingresar a la pestaña de enlaces → hacer click en el simbolo “+”
                  que aparece a la derecha del administrador  → digitar el nombre del nuevo enlace → llenar el resto de
                  campos solicitados → click en el botón de guardar. En caso de querer eliminar un enlace, se selecciona
                  y se hace click en el botón de Eliminar, confirmar eliminación.
                </li>
                <li>Explicación de los enlaces: Para agregar un enlace al navbar o menú principál, se debe seleccionar la
                  opción de MainMenu en el campo “seccion”, el campo de desplegable principál se debe dejar en blanco, en
                  el campo “enlace”, se escribirá el link a donde será dirigido y en “posición” se escribirá el orden en
                  que aparecerán. Finalmente debe hacerse click en el botón de guardar.
                </li>
                <li>Si se desea agregar un enlace dentro de otro, como aparece en el ejemplo de “soluciones holcim”, al
                  crearlo se le asignará en el campo de “Desplegable principál” El enlace al que pertenecerá
                  (en el enlace que se mostrará).
                </li>
                <li>Si se desea agregar un nuevo item a las redes sociales, debe seleccionarse en el campo “sección”
                  la opción de “socialLink”, de igual manera dejar el espacio de “desplegable principál” en blanco y
                  llenar el resto de campos del formulario.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
