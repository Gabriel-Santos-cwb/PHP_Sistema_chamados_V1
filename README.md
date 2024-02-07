Para começar o utilizar o sistema devemos criar as conexões de banco de dados de Login e Chamados 

Usuario: Admin
Senha: Admin@23


Sistema para registro e atendimento de chamados com separação de níveis de permissão e visualização e setores da empresa. 

Tela de login, onde existe a validação de login e senha fornecidos verificando o nível de permissão do usuário 

![2024-02-07_12h00_47](https://github.com/Gabriel-Santos-cwb/PHP_Sistema_chamados_V1/assets/97534186/0641369a-c938-41ed-be75-394ee5f8a65a)



Apos logado no sistema como Administrador tem a visão geral dos chamados criados na base junto com seus determinados status. Usuário administrador consegue adicionar novos serviços, categorias, usuários, calendário, SLA, status … e vinculados a qualquer setor cadastrado no sistema 

Usuário resolvedor logado no sistema, tem a visão de todos os chamados criados para seu setor e seus determinados status, podendo realizar interações com o usuário além de efetuar a troca de status do mesmo. Também podendo realizar o cadastro de novos usuários, serviços, categorias, SLA… porem todos ficam vinculados ao seu próprio setor, ou seja, ele sendo do setor “A” todas as configurações serão vinculadas ao setor e ele não consegue visualizar ou alterar as configurações do setor “B” 

![2024-02-07_12h12_22](https://github.com/Gabriel-Santos-cwb/PHP_Sistema_chamados_V1/assets/97534186/5c7e1798-fca2-4361-a129-0de7d1da03ac)



Acesso de usuário comum ele apenas consegue ter a visão de seus chamados e seus status atuais, além de realizar novas aberturas de solicitações, interações em seus chamados, realizar reabertura e cancelamento de protocolos além da edição de seus alguns dados como foto de perfil e senha

![2024-02-07_12h13_36](https://github.com/Gabriel-Santos-cwb/PHP_Sistema_chamados_V1/assets/97534186/fa81d203-d5bc-42a3-9ca9-4920ce3812f6)


Abertura de chamados com separação de setor, categoria, subcategoria e ação. 

![2024-02-07_12h14_47](https://github.com/Gabriel-Santos-cwb/PHP_Sistema_chamados_V1/assets/97534186/b3a3b3ea-79e3-439b-a0f4-a6fb96a5e7a9)



Barra de pesquisa palavra-chave 

![2024-02-07_12h05_26](https://github.com/Gabriel-Santos-cwb/PHP_Sistema_chamados_V1/assets/97534186/6cf3978c-3a5f-464a-9ea5-a931a0636e77)


Registro de interações 

![2024-02-07_12h07_17](https://github.com/Gabriel-Santos-cwb/PHP_Sistema_chamados_V1/assets/97534186/ef244c1a-c9d1-46ef-9f0c-263e7609598a)


Edição de Usuários:

![2024-02-07_12h08_19](https://github.com/Gabriel-Santos-cwb/PHP_Sistema_chamados_V1/assets/97534186/34f84ec9-76a1-49a3-9e56-5f2aa064a4c9)


Edição de ações 

![2024-02-07_12h09_54](https://github.com/Gabriel-Santos-cwb/PHP_Sistema_chamados_V1/assets/97534186/01e95a82-c867-45bb-ab73-4ac1485d1993)


Configurações e funcionalidades que não necessitam acesso ao código fonte: 

-Três nives de acesso.

-Barra de pesquisa por palavra-chave.

-Configurações de cadastro facilitado a usuários, setores, prioridades de resolução, status, SLA, calendários, serviços, categorias, subcategorias, ações, cidades.

-Alterações de imagens de ícones. 

-Configuração de tempo de atendimento podendo alterar a cor caso ultrapassado o limite.

-Transferência de chamados entre usuários e setores cadastrados.

-Envio de e-mail com as informações de abertura para a equipe/setor do atendimento junto a usuário. 

-Interações entre atendente e usuário.  

