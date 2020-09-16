Teste Back-end
Esta é uma avaliação básica de código.

O objetivo é conhecer um pouco do seu conhecimento/prática de RESTful, PHP e Laravel.

Recomendamos que você não gaste mais do que 4 - 6 horas.

Faça um fork deste repositório que contém o bootstrap de uma aplicação Laravel 7.0.

Ao finalizar o teste, submeta um pull request para o repositório e nosso time será notificado.

Tarefas

[ ] Endpoint que liste as moedas do sistema e o saldo de um usuário de cada uma e seu valor de conversão como no exemplo abaixo:
Importante: Listar TODAS as moedas cadastradas no sistema, mesmo as que o usuário não possui saldo.



    "currencies": [
        {
            "name": "BTC",
            "description": "Bitcoin",
            "image": "http://altcoinlab.netxs.com.br/test/icons/bitcoin.png",
            "conversion": {
                "btc": 1,
                "usd": 6973.18
            },
            "balance": 0
        },
        {
            "name": "ETH",
            "description": "Ethereum",
            "image": "http://altcoinlab.netxs.com.br/test/icons/ethereum.png",
            "conversion": {
                "btc": 0.00234902,
                "usd": 132.19
            },
            "balance": 2.13
        }
    ]
}


[ ] Endpoint para realizar uma conversão de moedas (usar como referência o menu EXCHANGE do template https://projects.invisionapp.com/share/B7WLCSPJTPY#/screens/411208916)
Requisitos
[ ] Todos os endpoints só podem ser acessados por usuários autenticados.

[ ] A autenticação deve ser feita utilizando Laravel Passport.

[ ] Criar um seeder para popular o banco com um usuário inicial, as moedas e suas carteiras.

[ ] Antes de efetuar a conversão de moedas, verificar se o usuário possui saldo na carteira.


Dicas


Template pode ser visualizado em: https://projects.invisionapp.com/share/B7WLCSPJTPY#/screens/410996725
Os valores das conversões das moedas podem ser dados fixos no banco de dados.
Testes são sempre bem-vindos 😃
