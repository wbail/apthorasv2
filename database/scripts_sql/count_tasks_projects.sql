-- Conta qnt de tasksfinalizadas e pendentes de cada projeto com seu cliente

select (select c.nome_fantasia
          from clients as c
         where c.id = p.client_id) as cliente
      , p.titulo
	  , case when p.fase = 0 then 'Iniciação' 
			 when p.fase = 1 then 'Planejamento'
			 when p.fase = 2 then 'Execução'
			 when p.fase = 3 then 'Monitoramento e Controle'
			 when p.fase = 4 then 'Finalização'
		end as fase
      , p.fase
      , p.status
      , count(t.id) as tp
      , (select count(t.id)
		   from tasks as t
		  where t.status = 100
			and p.id = t.project_id) as tc
  from projects as p
 inner join tasks as t
   on p.id = t.project_id
 where t.status < 100
 group by p.id, p.titulo, p.fase, p.status, cliente