<p align="center"><img src=".github/assets/img/logo.png" width="400px" alt="Gubee SDK Logo" /></p>
<p align="center">
</p>


# Sobre

O Gubee SDK é uma biblioteca que permite a integração com a API da Gubee, uma plataforma hub de integração com marketplaces. Com ela, é possível realizar a integração com a API da Gubee, permitindo a criação, atualização, exclusão e listagem de produtos e outros serviços.

# Instalação

Para instalar a biblioteca, basta executar o comando abaixo:

```bash
composer require gubee/sdk 
```

Para instalar com um http client específico, basta instalar o pacote do http client desejado e passar a instância do http client no construtor da classe principal. Abaixo, um exemplo de como instalar a biblioteca com o Guzzle:

```bash
composer require gubee/sdk guzzlehttp/guzzle guzzlehttp/psr7
```


# Utilização

Para utilizar a biblioteca, basta instanciar a classe principal e chamar os métodos disponíveis. Abaixo, um exemplo de como utilizar a biblioteca:

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Gubee\SDK\Gubee;

$gubee = new Gubee();

$productApi = new Gubee\Api\ProductApi($gubee);
$productApi->list();
```

# Documentação

A documentação completa da biblioteca pode ser encontrada em [https://apidocs.gubee.com.br](https://apidocs.gubee.com.br). Swagger: [api.gubee.com.br/api/swagger-ui/](https://api.gubee.com.br/api/swagger-ui/#/)

# Contribuição

Para contribuir com o projeto, basta abrir uma issue ou um pull request no repositório do projeto.

<p align="center">
    <strong><span style="letter-spacing:2px">MACOSTUDIOS</span> - 2024</strong>
</p>
