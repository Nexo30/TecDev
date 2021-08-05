<nav>
  <div>
    <a href="<?php echo constant('URL'); ?>index">Inicio</a>
    <button  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
    </button>
    <div id="navbarSupportedContent">
      <ul>
        <li >
          <a  aria-current="page" href="#"></a>
        </li>
        <li >
          <a  href="<?php echo constant('URL'); ?>consulta">Consulta</a>
        </li>

        <li >
          <a  href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Lista
          </a>

        </li>
        <li >
          <a  href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>


      </ul>
      <form >
        <input  type="search" placeholder="Search" aria-label="Search">
        <button  type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>