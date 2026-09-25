-- Conexão Azul Manaus - base inicial de serviços reais
-- Pesquisa/validação: 24/09/2026
-- Fontes prioritárias: Prefeitura de Manaus (SEMSA/SEMED) e SES-AM.
-- IMPORTANTE: contatos, horários e fluxos podem mudar; confirme periodicamente nas fontes oficiais.

USE rede_apoio_manaus;

-- Remove apenas os três registros demonstrativos da versão inicial.
DELETE FROM servicos WHERE nome IN ('Serviço demonstrativo 1','Serviço demonstrativo 2','Serviço demonstrativo 3');

INSERT INTO servicos
(nome,categoria,bairro,endereco,telefone,descricao,latitude,longitude,status)
VALUES
('CAIC TEA Dr. José Contente','TEA / atendimento especializado','Jorge Teixeira','Av. Autaz Mirim, 950 - Jorge Teixeira, Manaus - AM, CEP 69099-785','(92) 3199-5776','Unidade estadual de atenção especializada voltada a crianças com transtorno do espectro autista, com atendimento multiprofissional. Horário informado pela SES-AM: 7h às 17h. Fonte oficial: SES-AM.',NULL,NULL,'ativo'),

('CAIC TEA Dr. Gilson Moreira','TEA / atendimento especializado','Mundo Novo','Rua Aracatu, 80 - Mundo Novo, Manaus - AM, CEP 69090-475','(92) 3581-9902','Unidade estadual com equipe multiprofissional voltada ao atendimento de crianças com TEA, incluindo neuropediatria ou psiquiatria, terapia ocupacional, psicopedagogia, fonoaudiologia, psicomotricidade, fisioterapia, nutrição e serviço social. Fonte oficial: SES-AM.',NULL,NULL,'ativo'),

('Centro Especializado em Reabilitação CER II Prof. Rolls Gracie','Reabilitação física e intelectual','Nossa Senhora das Graças','Rua Teresina, 99 - Nossa Senhora das Graças, Manaus - AM','(92) 98842-8729','Centro especializado da SEMSA para reabilitação física e intelectual. Oferece, entre outros serviços, fisioterapia, psicologia, terapia ocupacional, fonoaudiologia e enfermagem. Acesso por encaminhamento médico e agendamento via Sisreg. Horário informado: 7h às 18h.',NULL,NULL,'ativo'),

('CAPSi Leste','Saúde mental infantojuvenil / TEA','Coroado','Av. Adolfo Ducke, 1221 - Conjunto Acariquara, Coroado, Manaus - AM','(92) 98842-4272','Centro de Atenção Psicossocial Infantojuvenil para crianças e adolescentes, incluindo atendimento relacionado a transtornos mentais e autismo. Funcionamento informado pela Prefeitura: segunda a sexta, 7h às 17h.',NULL,NULL,'ativo'),

('CAPSi Sul','Saúde mental infantojuvenil / TEA','Parque das Laranjeiras','Rua Santa Catarina, 3 - Parque das Laranjeiras, Manaus - AM','(92) 98842-5899','Centro de Atenção Psicossocial Infantojuvenil para crianças e adolescentes, incluindo atendimento relacionado a transtornos mentais e autismo. Fonte: Prefeitura de Manaus/SEMSA.',NULL,NULL,'ativo'),

('Policlínica Codajás','Atenção especializada / reabilitação','Cachoeirinha','Av. Codajás, 26 - Cachoeirinha, Manaus - AM, CEP 69065-130','(92) 3612-4200','Unidade estadual de atendimento especializado do SUS. A Prefeitura também a relaciona entre referências de reabilitação para avaliação de casos suspeitos de autismo. Horário informado pela SES-AM: 7h às 17h.',NULL,NULL,'ativo'),

('Policlínica Dr. José Antônio da Silva','Reabilitação','Monte das Oliveiras','Rua Grumixava, 55 - Monte das Oliveiras, Manaus - AM','(92) 3232-9992','Unidade indicada pela SEMSA entre os locais com serviços de reabilitação. Horário informado: 7h às 17h. O acesso à reabilitação ocorre a partir da rede de saúde conforme avaliação e encaminhamento.',NULL,NULL,'ativo'),

('Policlínica Anna Barreto','Reabilitação','Jorge Teixeira','Av. Autaz Mirim, 1665 - Jorge Teixeira, Manaus - AM','(92) 98842-6606 / 98842-7297','Unidade indicada pela SEMSA entre os locais com serviços de reabilitação. Horário informado: 7h às 17h.',NULL,NULL,'ativo'),

('USF Armando Mendes','Reabilitação','Manoa','Travessa Ticuna, s/n - Manoa, Manaus - AM','(92) 98842-8333 / 98842-6262','Unidade de Saúde da Família indicada pela SEMSA entre os locais que disponibilizam serviços de reabilitação. Horário informado: 7h às 17h.',NULL,NULL,'ativo'),

('USF Arthur Virgílio Filho','Reabilitação','Amazonino Mendes','Travessa 10, 3015 - Amazonino Mendes, Manaus - AM','(92) 3644-9354','Unidade de Saúde da Família indicada pela SEMSA entre os locais que disponibilizam serviços de reabilitação. Horário informado: 7h às 19h.',NULL,NULL,'ativo'),

('Policlínica Dr. Antônio Comte Telles','Reabilitação','São José Operário','Rua Barreirinha, s/n - São José Operário, Manaus - AM','(92) 98842-8704','Unidade indicada pela SEMSA entre os locais com serviços de reabilitação. Horário informado: 7h às 18h.',NULL,NULL,'ativo'),

('USF Gebes Medeiros','Reabilitação','Jorge Teixeira','Av. Pirarucu, 100 - Jorge Teixeira, Manaus - AM','(92) 98842-8361','Unidade de Saúde da Família indicada pela SEMSA entre os locais que disponibilizam serviços de reabilitação. Horário informado: 7h às 17h.',NULL,NULL,'ativo'),

('Policlínica Castelo Branco','Reabilitação','Parque 10 de Novembro','Rua Papa João XXIII, s/n - Parque 10 de Novembro, Manaus - AM','(92) 98842-6148 / 98842-8398','Unidade indicada pela SEMSA entre os locais com serviços de reabilitação. Horário informado: 7h às 17h.',NULL,NULL,'ativo'),

('USF Dr. Antônio Reis','Reabilitação','São Lázaro','Rua São Lázaro, 45 - São Lázaro, Manaus - AM','(92) 98842-8851 / 98842-6622','Unidade de Saúde da Família indicada pela SEMSA entre os locais que disponibilizam serviços de reabilitação. Horário informado: 7h às 19h.',NULL,NULL,'ativo'),

('Gerência de Educação Especial - Complexo Municipal André Vidal de Araújo','Educação especial / orientação','Parque Dez de Novembro','Rua da Penetração, esquina com Rua Maceió, s/n - Vila Amazonas, Parque Dez de Novembro, Manaus - AM','(92) 3216-7082 / 98842-7168 / 99962-5563','Gerência de Educação Especial da SEMED, no Complexo Municipal de Educação Especial André Vidal de Araújo. Atendimento informado: segunda a sexta, 8h às 12h e 13h às 17h. E-mail: gee@semed.manaus.am.gov.br.',NULL,NULL,'ativo'),

('Projeto Espaço Superação - CEMASP / SEMED','TDAH / apoio educacional','Manaus','Atendimento pelos Centros Municipais Sociopsicopedagógicos (CEMASPs) da rede municipal de Manaus','SEMED: (92) 98444-3905','Projeto da SEMED voltado a estudantes com TDAH e seus pais ou responsáveis, com atendimento multiprofissional. A Prefeitura informa participação de psicologia, fonoaudiologia, psicopedagogia, serviço social e Educação Física. Consulte a SEMED para saber qual CEMASP atende a escola/região do estudante.',NULL,NULL,'ativo');

-- Fontes oficiais consultadas em 24/09/2026:
-- https://www.saude.am.gov.br/unidades-de-saude/caic-dr-jose-contente/
-- https://www.saude.am.gov.br/unidades-de-saude/caic-gilson-moreira/
-- https://www.manaus.am.gov.br/semsa/unidades/centro-especializado-em-reabilitacao-cer/
-- https://www.manaus.am.gov.br/semsa/programas-e-servicos/saude-da-pessoa-com-deficiencia/
-- https://www.manaus.am.gov.br/noticia/saude/prefeitura-de-manaus-disponibiliza-rede-de-apoio-a-pessoas-em-sofrimento-psiquico/
-- https://www.saude.am.gov.br/unidades-de-saude/policlinica-codajas/
-- https://www.manaus.am.gov.br/semed/educacao-especial/fale-conosco/
-- https://www.manaus.am.gov.br/semed/cemasps/
-- https://www.manaus.am.gov.br/semed/not%C3%ADcias/inclusao/espaco-superacao-atividades-mais-de-280-familias/
