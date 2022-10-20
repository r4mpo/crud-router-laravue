<template>
    <header>
        <div class="header">
            <h5>Controle de Produtos <i class="bi bi-basket-fill"></i></h5>
        </div>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid nav-style">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <router-link class="link-style" :to="{name: 'produtos'}"><i class="bi bi-bag"></i> Controle de
                        Estoque</router-link>
                    <router-link class="link-style ml-10px" :to="{name: 'sobre_nos'}"><i class="bi bi-github"></i> Erick
                        Agostinho (@r4mpo)</router-link>
                </div>
            </div>
        </nav>
    </header>
    <router-view></router-view>
</template>
  
<script>
export default {
    name: "App"
}
</script>
  
<style>
body {
    background-color: rgb(3, 41, 0);
}
</style>