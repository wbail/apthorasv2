-- Qnt de tasks completas e não completas por usuário

select u.name
	 , count(t.id) as qnt_nao_completa
	 , (select count(t.id)
		  from tasks as t
		 where t.status = 100
		   and u.id = t.user_id) as qnt_completa
  from users as u
 inner join tasks as t
	on u.id = t.user_id
 where t.status < 100
 group by u.name;
