<template>

    <section>
        <div class="formulario">
            <form @submit.prevent="salvar" method="post" id="form">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-gear"></i></span>
                    <input type="text" maxlength="80" v-model="produto.produto" class="form-control"
                        placeholder="Produto" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-cash-coin"></i></span>
                    <input type="number" step="0.01" v-model="produto.preco" class="form-control" placeholder="Preço"
                        aria-label="Username" aria-describedby="basic-addon1" id="preco">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-receipt"></i></span>
                    <input type="number" v-model="produto.cod_de_barras" class="form-control"
                        placeholder="Código de barras" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <button class="btn-produto">SALVAR PRODUTO <i class="bi bi-sd-card"></i></button>
            </form>
        </div>
    </section>

    <section class="secao-table">

        <table class="table table-bordered border-dark tb-style">

            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">PRODUTO</th>
                    <th scope="col">PREÇO</th>
                    <th scope="col">COD. BARRAS</th>
                    <th scope="col">AÇÕES</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="produto of produtos" :key="produto.id">
                    <th scope="row">{{ produto.id }}</th>
                    <td>{{ produto.produto }}</td>
                    <td>{{ produto.preco }}</td>
                    <td>{{ produto.cod_de_barras }}</td>
                    <td>
                        <i class="bi bi-pencil color-blue" @click="editar(produto)"></i>
                        <i class="bi bi-trash3 color-red" @click="excluir(produto)"></i>
                    </td>
                </tr>
            </tbody>

        </table>
    </section>
</template>

<script>

import Produtos from '../services/produtos.js';

export default {
    data() {
        return {
            produto: {
                id: '',
                produto: '',
                preco: '',
                cod_de_barras: ''
            },
            produtos: []
        }
    },

    mounted() {
        this.trazer();
    },

    methods: {

        trazer() {
            Produtos.trazerProdutos().then(resposta => {
                console.log(resposta.data.produtos);
                this.produtos = resposta.data.produtos;
            })
        },

        salvar() {
            if (!this.produto.id) {
                Produtos.salvarProdutos(this.produto).then(resposta => {
                    Swal.fire(
                        'LARAVUE: CRUD/ROUTER',
                        resposta.data.mensagem,
                        resposta.data.icon
                    )
                    this.trazer();
                })
            } else {
                Produtos.atualizarProdutos(this.produto).then(resposta => {
                    Swal.fire(
                        'LARAVUE: CRUD/ROUTER',
                        resposta.data.mensagem,
                        resposta.data.icon
                    )
                    this.trazer();
                })
            }
        },

        editar(produto) {
            this.produto = produto
        },

        excluir(produto) {
            Produtos.excluirProdutos(produto).then(resposta => {
                Swal.fire(
                    'LARAVUE: CRUD/ROUTER',
                    resposta.data.mensagem,
                    resposta.data.icon
                )
                this.trazer();
            })
        }

    }
}
</script>

<style>
@media screen and (min-width: 992px) {
    .tb-style {
        width: 800px;
    }
}
</style>