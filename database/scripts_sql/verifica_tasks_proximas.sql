
-- Verifica se tem tasks não completas próximas de seu vencimento, faltando 1, 3 ou 7 dias

select t.id
	 , t.descricao
	 , t.prazo_finalizacao
	 , (select u.email
		  from users as u
		 where u.id = t.user_id) as email
	 , (select p.titulo
		  from projects as p
		 where p.id = t.project_id) as projeto
  from tasks as t
 where t.status < 100
   and date_format(t.prazo_finalizacao, '%d/%m/%Y') = date_format(now(), '%d/%m/%Y')
	or date_format(t.prazo_finalizacao, '%d/%m/%Y') = date_format((now() + interval 1 day), '%d/%m/%Y')
    or date_format(t.prazo_finalizacao, '%d/%m/%Y') = date_format((now() + interval 3 day), '%d/%m/%Y')
    or date_format(t.prazo_finalizacao, '%d/%m/%Y') = date_format((now() + interval 7 day), '%d/%m/%Y');