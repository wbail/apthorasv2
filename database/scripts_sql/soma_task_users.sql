-- Soma dos tempos de cada tarefa por usuário

select (select t.descricao
		  from tasks as t
		 where t.id = a.task_id) as task
	 , (select u.name
		  from users as u
		 where u.id = a.user_id) as user
	 , concat(HOUR(SEC_TO_TIME(sum(UNIX_TIMESTAMP(a.hora_fim) - UNIX_TIMESTAMP(a.hora_inicio)))), ' horas '
	 ,        MINUTE(SEC_TO_TIME(sum(UNIX_TIMESTAMP(a.hora_fim) - UNIX_TIMESTAMP(a.hora_inicio)))), ' minutos ' 
     ,        SECOND(SEC_TO_TIME(sum(UNIX_TIMESTAMP(a.hora_fim) - UNIX_TIMESTAMP(a.hora_inicio)))), ' segundos') as diff
  from apontamentos as a
 where a.user_id = 1
 group by task;