-->Create TABLESPACE
CREATE TABLESPACE oraclerheza
datafile 'E:\Kuliah\semester 4\basis data\oraclerheza.dbf'
size 30M;

-->create USER
CREATE USER rheza_paleva_07067
IDENTIFIED BY rheza
DEFAULT TABLESPACE oraclerheza
QUOTA 30M ON oraclerheza;

-->Table users
create table t_hak_akses
(
	id_user integer not null,
	username varchar2(32),
	password_07067 varchar2(64)
);

alter table users
add constraint pk_id_user primary key (id_user)

create sequence id_user
minvalue 1
maxvalue 9999
start with 1
increment by 1
cache 20;

create or replace trigger t_hak_akses_on_insert
before insert on t_hak_akses
for each row
begin
select id_user.nextval
into :new.id_user
from dual;
end;
/

-->Table t_transaksi
create table t_transaksi
(
	id_transaksi integer not null,
	id_baju_m integer,
	id_user integer,
	total_harga_baju_m float(12),
	tgl_transaksi TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

alter table t_transaksi
add constraint pk_id_transaksi primary key (id_transaksi)

create sequence id_transaksi
minvalue 1
maxvalue 9999
start with 1
increment by 1
cache 20;

create or replace trigger t_transaksi_on_insert
before insert on t_transaksi
for each row
begin
select id_transaksi.nextval
into :new.id_transaksi
from dual;
end;
/

-->Table t_baju_m
create table t_baju_m
(
ID_BAJU_M                                 NOT NULL NUMBER(38),
ID_JENIS_M                                         NUMBER(38),
NAMA_BAJU_M                                        VARCHAR2(20),
UKURAN_BAJU_M                                      VARCHAR2(20),
HARGA_BAJU_M                                       FLOAT(20)
);

alter table t_transaksi
add constraint pk_id_baju_m primary key (id_baju_m)

create sequence id_baju_m
minvalue 1
maxvalue 9999
start with 1
increment by 1
cache 20;

create or replace trigger t_baju_m_on_insert
before insert on t_baju_m
for each row
begin
select id_baju_m.nextval
into :new.id_baju_m
from dual;
end;
/


-->Table t_jenis_baju_m
create table t_jenis_baju_m
(
 ID_JENIS_M                                NOT NULL NUMBER(38),
 NAMA_JENIS_BAJU_M                                  VARCHAR2(20)
);

alter table t_jenis_baju_m
add constraint pk_id_jenis_m primary key (id_jenis_m)

create sequence id_jenis_m
minvalue 1
maxvalue 9999
start with 1
increment by 1
cache 20;

create or replace trigger t_jenis_baju_m_on_insert
before insert on t_jenis_baju_m
for each row
begin
select id_jenis_m.nextval
into :new.id_jenis_m
from dual;
end;
/

