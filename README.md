  **Nome dos Alunos:**

João Pedro Maciel Pimenta, Samuel José Soares Souza dos Santos, Pedro Queiroga Crescêncio da Costa, Eduardo Camelo.

  **Descrição do Projeto:**

Este projeto consiste em um modelo de banco de dados completo para um shopping usando BrModelo para modelar o Conceitual e gerar Relacional e Físico, abrangendo três áreas principais: uma clínica médica, um gerenciador de eventos e um restaurante. O sistema foi desenvolvido em três etapas: modelo conceitual, modelo lógico e modelo físico.

  **Requisitos Mínimos:**
Os requisitos mínimos implementados foram definidos para cada um dos casos a seguir:

Caso 1 - Sistema de Gerenciamento da Clínica Médica
Objetivo: Desenvolver um sistema de gerenciamento de uma clínica médica usando MER.

Requisitos:

1- Identificação das entidades principais: Paciente, Médico, Consulta e Recepção.

2- Definição dos atributos essenciais para cada entidade, como nome do paciente, especialidade do médico e data da consulta.

3- Estabelecimento de relacionamentos entre as entidades, como a relação entre Paciente e Médico (através da Consulta).

4- Uso de cardinalidades para especificar a quantidade de entidades em cada lado do relacionamento.

5- Modelagem de especialização-generalização, como diferentes tipos de médicos (clínico geral, especialista) com atributos específicos.


![PngDoBD](https://github.com/Pimenta15/BDprojeto/blob/master/Caso1.png)

Caso 2 - Sistema de Gerenciamento de Eventos
Objetivo: Criar um sistema de gestão de eventos usando MER.

Requisitos:

1- Identificação das entidades principais: Evento, Participante, Local e Inscrição.

2- Definição dos atributos essenciais para cada entidade, como nome do evento, data e local do evento, e nome do participante.

3- Estabelecimento de relacionamentos entre as entidades, como a relação entre Evento e Participante (através de Inscrição).

4- Uso de cardinalidades para especificar a quantidade de entidades em cada lado do relacionamento.

5- Modelagem de agregações, como a possibilidade de um evento ter várias sessões ou palestras.


![PngDoBD](https://github.com/Pimenta15/BDprojeto/blob/master/Caso2.png)

Caso 3 - Sistema de Gerenciamento de Restaurante
Objetivo: Desenvolver um sistema de gerenciamento para um restaurante usando MER.

Requisitos:

1- Identificação das principais entidades: Cliente, Mesa, Pedido e Item do Pedido.

2- Definição dos atributos essenciais para cada entidade, como nome do cliente, número da mesa e descrição do item do pedido.

3 -Estabelecimento de relacionamentos entre as entidades, como a relação entre Pedido e Item do Pedido.

4- Uso de cardinalidades para especificar a quantidade de entidades em cada lado do relacionamento.

5- Modelagem de especialização-generalização, considerando diferentes tipos de pedidos (para viagem, consumo no local) com atributos específicos.

![PngDoBD](https://github.com/Pimenta15/BDprojeto/blob/master/Caso3.png)

  **Requisitos Adicionais**
Além dos requisitos mínimos, o sistema foi expandido para incluir novas entidades e funcionalidades, conforme descrito abaixo:

Novo Sistema de Fidelidade:

  Implementação de uma tabela Cliente com um sistema de pontos que permite aos clientes acumular pontos baseados nas interações no shopping.
Entidades Adicionais:

![PngDoBD](https://github.com/Pimenta15/BDprojeto/blob/master/Generalização.png)

  Garçom: Uma nova tabela foi criada para gerenciar as informações dos garçons que atendem no restaurante.
Plano de Saúde: Adicionada para permitir que os pacientes sejam vinculados a planos de saúde, com informações sobre coberturas e mensalidades.
Relacionamentos Ampliados:

  As tabelas foram conectadas com novos relacionamentos, como entre Paciente e Plano de Saúde, e entre Pedido e Garçom, permitindo uma gestão mais integrada e detalhada.
Modelagem de Agregações e Especializações:

  Agregações para eventos que podem incluir múltiplas sessões e especializações para tipos de pedidos (para viagem e consumo no local) foram modeladas para maior flexibilidade.
Motivação para os Requisitos Adicionais
A inclusão dessas novas entidades e funcionalidades visa aumentar a eficiência do sistema, permitindo uma gestão mais abrangente e integrada dos serviços oferecidos no shopping. O sistema de fidelidade, em particular, foi projetado para aumentar a retenção de clientes e incentivar visitas frequentes.

**Conclusão:**

  Este projeto oferece uma base sólida para a gestão de um shopping, permitindo a expansão futura com novas funcionalidades. O sistema de fidelidade e as novas entidades são adições valiosas que podem aumentar a frequência de clientes e melhorar a experiência geral.

  ![lexTreinador](https://github.com/Pimenta15/BDprojeto/blob/master/lex.jpg)


  
