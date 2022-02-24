<template>
<nav class="navbar justify-content-end navbar-expand-lg navbar-gradient sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
    <img id="logo" :src="logo" :alt="alt">
    </a>
    <button class="navbar-toggler border" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="btn btn-outline-warning"></span>
    </button>
    <div class="collapse navbar-collapse align-content-around justify-content-end" id="navbarNav">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="clientes">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="servicos">Serviços</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="agendamentos">Agendamentos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pets">Pets</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</template>

<script>
export default {
  name: "Navbar",
  props: ["logo", "alt"]
}
</script>

<style scoped>

.navbar-gradient {
  background: linear-gradient(180deg, #FFFFFF 0%, rgba(255, 255, 255, 0)100%);
  transition: height 0.5s;
  backdrop-filter: blur(8px);
}

  #logo {
    width: 80px;
    height: 80px;
  }
  .nav-link {
    color: #fcba03;
    text-decoration: none;
    margin: 12px;
    transition: .5s;
  }
  .nav-link:hover {
    color: rgb(156, 108, 3);
  }
.navbar-toggler {
  background-color: #222;
  opacity: 30%;
}
</style>