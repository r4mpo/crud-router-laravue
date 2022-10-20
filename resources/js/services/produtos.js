import { http } from './config.js';

export default {

    trazerProdutos: () => {
        return http.get('/api/produto')
    },

    salvarProdutos: (produto) => {
        return http.post('/api/produto', produto);
    },

    atualizarProdutos: (produto) => {
        return http.put(`/api/produto/${produto.id}`, produto);
    },

    excluirProdutos: (produto) => {
        return http.delete(`/api/produto/${produto.id}`, {data: produto});
    }
}
