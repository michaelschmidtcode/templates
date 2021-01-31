-- ale Personen mit Jobbezeichnung
-- Person | Job
select concat_ws('', pe_vname, pe_nname) as "Person", job_name as "Job" from person, job where person.job_id = job.job_id;

-- inner join
select concat_ws('', pe_vname, pe_nname) as "Person", job_name as "Job" from person p inner join job j on p.job_id = j.job_id;

-- inner join
select concat_ws('', pe_vname, pe_nname) as "Person", job_name as "Job" from person p inner join job j using(job_id);

-- natural join
select concat_ws('', pe_vname, pe_nname) as "Person", job_name as "Job" from person natural join job;

-- outer join
select concat_ws('', pe_vname, pe_nname) as "Person", job_name as "Job" from person left outer join job using(job_id):

-- alle job
select concat_ws('', pe_vname, pe_nname) as "Person", job_name as "Job" from job left outer join person using(job_id);

-- alle job
select concat_ws('', pe_vname, pe_nname) as "Person", job_name as "Job" from job left outer join person using(job_id) where pe_vname is not null;

-- ohne job
select pe_vname from person where pe_id not in (select pe_id from person_lehrberuf);

-- mit job
select pe_nname, (select job_name from job where job_id = person.job_id) as "job";

use berufsschule;
select pe_id as "ID", concat_ws(' ', pe_vname, pe_nname) as 'Name' from person where pe_vname LIKE 'L%' OR pe_nname LIKE 'E%' order by pe_vname;
select pe_id as "ID", concat_ws(' ', pe_vname, pe_nname) as 'Name' from person where pe_vname LIKE '_a%' order by pe_vname;
select bs_id as "Schulnummer", concat_ws(' ', bs_zusatz, bs_ort) as 'Schulname' from bs where bs_ort like 'Linz';
select lb_id, lb_bezeichnung, lb_kurz from lehrberuf order by lb_bezeichnung;
select lb_id, lb_bezeichnung, lb_kurz from lehrberuf where lb_id not in (select lb_id from bs_lehrberuf);
select concat_ws(' ', le.lb_bezeichnung, le.lb_kurz) as 'Lehrberuf', count(p.pe_id) "anz" from lehrberuf le join person_lehrberuf p on p.lb_id = le.lb_id group by le.lb_id having anz > 1;
select concat_ws(' ', b.bs_zusatz, b.bs_ort) as 'Schulname', count(p.pe_id) as "Schueler" from lehrberuf le join person_lehrberuf p on p.lb_id = le.lb_id join bs b on p.bs_id = b.bs_id;
select concat_ws(' ', b.bs_zusatz, b.bs_ort) as 'Schulname', l.lb_kurz as "Lehrberuf", concat_ws(' ', p.pe_vname, p.pe_nname) as 'Person' from bs b join bs_lehrberuf bs on b.bs_id  = bs.bs_id
join lehrberuf l on bs.lb_id = l.lb_id join person_lehrberuf pl on pl.lb_id = bs.lb_id join person p on p.pe_id = pl.pe_id;

use berufsschule;
-- 1
select pe_id as "ID", concat_ws(' ', pe_vname, pe_nname) as 'Name' from person where pe_vname LIKE 'L%' OR pe_nname LIKE 'E%' order by pe_vname;
-- 2
select pe_id as "ID", concat_ws(' ', pe_vname, pe_nname) as 'Name' from person where pe_vname LIKE '_a%' order by pe_vname;
-- 3
select bs_id as "Schulnummer", concat_ws(' ', bs_zusatz, bs_ort) as 'Schulname' from bs where bs_ort like 'Linz';
-- 4
select lb_id, lb_bezeichnung, lb_kurz from lehrberuf order by lb_bezeichnung;
-- 5
select lb_id, lb_bezeichnung, lb_kurz from lehrberuf where lb_id not in (select lb_id from bs_lehrberuf);
-- 6
select concat_ws(' ', le.lb_bezeichnung, le.lb_kurz) as 'Lehrberuf', count(p.pe_id) "anz" from lehrberuf le join person_lehrberuf p on p.lb_id = le.lb_id group by le.lb_id having anz > 1;
-- 7
insert into person_lehrberuf values (2,2,5,'2016-09-05','2016-11-09');
-- 8
select concat_ws(' ', b.bs_zusatz, b.bs_ort) as 'Schulname', count(p.pe_id) as "Schueler" from lehrberuf le join person_lehrberuf p on p.lb_id = le.lb_id join bs b on p.bs_id = b.bs_id group by b.bs_id;
-- 9
select concat_ws(' ', b.bs_zusatz, b.bs_ort) as 'Schulname', l.lb_kurz as "Lehrberuf", concat_ws(' ', p.pe_vname, p.pe_nname) as 'Person' from bs b join bs_lehrberuf bs on b.bs_id  = bs.bs_id
join lehrberuf l on bs.lb_id = l.lb_id join person_lehrberuf pl on pl.lb_id = bs.lb_id join person p on p.pe_id = pl.pe_id;