# Perguntas Tecnicas para PHP Back-End Developer JR.

1. Quanto tempo você usou para completar a solução apresentada? O que você faria se tivesse mais tempo?
    Para completar a solução que estou apresentando, usei o total de 10 horas trabalhadas durante 3 dias de desenvolvimento.
    Com mais tempo de desenvolvimento, seria possível desenvolver mais testes unitários e de melhor qualidade. Os testes unitários demandam mais tempo e conhecimento, principalmente pela necessidade de mock para obter os melhores resultados.

2. Se usou algum framework, qual foi o motivo de ter usado este? Caso contrário, por que não utilizou nenhum?
    Sim, foi utilizado o framework Laravel na versão 8.83.23, pois ele proporciona um desenvolvivmento rápido, ágil e eficiente com PHP, por possuir várias bibliotecas e ferramentas auxiliadoras para um melhor desenvolvimento.

# Iniciar o projeto.

- Para iniciar o projeto é necessario ter PHP 7 e MySql instalados, além do framework Laravel. 
- É possível instalar o Laravel utilizando `composer global require laravel/installer`.
- Para inciar o projeto rode o comando `php artisan serve`.
- Para criar o database apenas rode o comando `docker-compose up`
- Após iniciar o server e criar o database, é necessário utilizar o migrate para a utlização do DB `php artisan migrate`.
- Para consultar a API o caminho a ser utilizado é : `'/api/weather/{Nome da Cidade}'`


Muito obrigado!