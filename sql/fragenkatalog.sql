use fragenkatlog_lap;
-- 1
select t.themengebiet as "Themengebiet" from fragen f join fragen_has_themengebiete fht on fht.fragen_id = f.id join themengebiete t on fht.themengebiete_Id  = t.id group by f.id having f.id = 1;
-- 2
select t.themengebiet as "Themengebiet", fa.fachgebiet as "Fachgebiet" from antworten a join antworten_has_fragen ahf on ahf.antworten_id = a.id
join fragen f on f.id = ahf.fragen_id join fragen_has_themengebiete fht on fht.fragen_id = f.id join themengebiete t on fht.themengebiete_Id  = t.id
join fachgebiete fa on fa.id = t.fachgebiete_id group by a.id having a.id = 1;
-- 3
select b.benutzername as "Benutzer" from benutzer b left join frageboegen_has_benutzer fhb on b.id = fhb.benutzer_id where fhb.frageboegen_id is null;
-- 4
select f.frage as "Frage", a.Antwort as "Antwort", fg.fachgebiet as "Fachgebiet", t.themengebiet as "Themengebiet" from fragen f join fragen_has_themengebiete fht on fht.fragen_id = f.id
join antworten_has_fragen ahf on ahf.fragen_id = f.id join antworten a on a.id = ahf.antworten_id
join themengebiete t on fht.themengebiete_Id join fachgebiete fg on fg.id = t.fachgebiete_id order by fg.fachgebiet, t.themengebiet;
-- 5
select f.frage as "Frage", a.Antwort as "Antwort" from frageboegen fb
join Antworten_has_Fragen_has_Frageboegen ahfhf on fb.id = ahfhf.frageboegen_id
join antworten_has_fragen ahf on ahf.id = ahfhf.antworten_has_fragen_id join antworten a on a.id = ahf.antworten_id
join fragen f on f.id = ahf.fragen_id join fragen_has_themengebiete fht on fht.fragen_id = f.id;
-- 6
select f.frage as "Frage",count(a.id) as "Anzahl" from fragen f left join antworten_has_fragen ahf on ahf.fragen_id = f.id left join antworten a on a.id = ahf.antworten_id group by f.id;
-- 7
select f.frage as "Frage",count(a.id) as "Anzahl" from fragen f left join antworten_has_fragen ahf on ahf.fragen_id = f.id left join antworten a on a.id = ahf.antworten_id group by f.id having Anzahl < 3;
-- 8
select f.frage as "Frage" from fragen f left join antworten_has_fragen ahf on ahf.fragen_id = f.id where ahf.antworten_id is null;


--
use fragenkatlog_lap;

select f.frage as "Frage", a.Antwort as "Antwort", fg.fachgebiet as "Fachgebiet", t.themengebiet as "Themengebiet"
from antworten a join antworten_has_fragen ahf on ahf.antworten_id = a.id
join fragen f on ahf.fragen_id = f.id join fragen_has_themengebiete fht on fht.fragen_id = f.id
join themengebiete t on fht.themengebiete_Id join fachgebiete fg on fg.id = t.fachgebiete_id order by fg.fachgebiet, t.themengebiet;