CREATE TABLE "usuarios" (
	"usu_pk" serial NOT NULL,
	"usu_rut" VARCHAR(12) NOT NULL,
	"usu_nombre" VARCHAR(20) NOT NULL,
	"usu_apellido" VARCHAR(20) NOT NULL,
	"usu_telefono" VARCHAR(12) NOT NULL,
	"usu_correo" VARCHAR(20) NOT NULL,
	CONSTRAINT usuarios_pk PRIMARY KEY ("usu_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "roles" (
	"rol_pk" serial NOT NULL,
	"rol_nombre" VARCHAR(20) NOT NULL,
	CONSTRAINT roles_pk PRIMARY KEY ("rol_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "productos" (
	"pro_pk" serial NOT NULL,
	"pro_nombre" serial(20) NOT NULL,
	"pro_descripcion" VARCHAR(50) NOT NULL,
	"pro_serie" VARCHAR(20) NOT NULL,
	"mar_fk" integer NOT NULL,
	"lis_fk" integer NOT NULL,
	CONSTRAINT productos_pk PRIMARY KEY ("pro_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "estado" (
	"est_pk" serial NOT NULL,
	"est_nombre" VARCHAR(20) NOT NULL,
	"est_descripcion" VARCHAR(50) NOT NULL,
	CONSTRAINT estado_pk PRIMARY KEY ("est_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "piezas" (
	"pie_pk" serial NOT NULL,
	"pie_nombre" VARCHAR(20) NOT NULL,
	"pie_descripcion" VARCHAR(50) NOT NULL,
	CONSTRAINT piezas_pk PRIMARY KEY ("pie_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "empleados" (
	"emp_pk" serial NOT NULL,
	"emp_contraseña" VARCHAR(50) NOT NULL,
	"usu_fk" integer NOT NULL,
	"rol_fk" integer NOT NULL,
	CONSTRAINT empleados_pk PRIMARY KEY ("emp_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "recepcion" (
	"rec_pk" serial NOT NULL,
	"res_fecha" DATE NOT NULL,
	"cli_fk" integer NOT NULL,
	"emp_fk" integer NOT NULL,
	"cat_fk" integer NOT NULL,
	"pro_fk" integer NOT NULL,
	"res_condicion" VARCHAR(100) NOT NULL,
	"est_fk" integer NOT NULL,
	"dia_fk" integer NOT NULL,
	CONSTRAINT recepcion_pk PRIMARY KEY ("rec_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "clientes" (
	"cli_pk" serial NOT NULL,
	"usu_fk" integer NOT NULL,
	CONSTRAINT clientes_pk PRIMARY KEY ("cli_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "lista_piezas" (
	"lis_pk" serial NOT NULL,
	"pie_fk" integer NOT NULL,
	CONSTRAINT lista_piezas_pk PRIMARY KEY ("lis_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "categorias" (
	"cat_pk" serial NOT NULL,
	"cat_nombre" VARCHAR(20) NOT NULL,
	"cat_descripcion" VARCHAR(50) NOT NULL,
	CONSTRAINT categorias_pk PRIMARY KEY ("cat_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "marcas" (
	"mar_pk" serial NOT NULL,
	"mar_nombre" VARCHAR(20) NOT NULL,
	CONSTRAINT marcas_pk PRIMARY KEY ("mar_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "entrega" (
	"ent_pk" serial NOT NULL,
	"ent_fecha" DATE NOT NULL,
	"rec_fk" integer NOT NULL,
	"emp_fk" integer NOT NULL,
	"ent_evaluacion" VARCHAR(100) NOT NULL,
	CONSTRAINT entrega_pk PRIMARY KEY ("ent_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "solucion" (
	"sol_pk" serial NOT NULL,
	"sol_nombre" VARCHAR(20) NOT NULL,
	CONSTRAINT solucion_pk PRIMARY KEY ("sol_pk")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "diagnostico" (
	"dia_pk" serial NOT NULL,
	"dia_diasnostico" VARCHAR(100) NOT NULL,
	"emp_fk" integer NOT NULL,
	"sol_fk" integer NOT NULL,
	CONSTRAINT diagnostico_pk PRIMARY KEY ("dia_pk")
) WITH (
  OIDS=FALSE
);





ALTER TABLE "productos" ADD CONSTRAINT "productos_fk0" FOREIGN KEY ("mar_fk") REFERENCES "marcas"("mar_pk");
ALTER TABLE "productos" ADD CONSTRAINT "productos_fk1" FOREIGN KEY ("lis_fk") REFERENCES "lista_piezas"("lis_pk");



ALTER TABLE "empleados" ADD CONSTRAINT "empleados_fk0" FOREIGN KEY ("usu_fk") REFERENCES "usuarios"("usu_pk");
ALTER TABLE "empleados" ADD CONSTRAINT "empleados_fk1" FOREIGN KEY ("rol_fk") REFERENCES "roles"("rol_pk");

ALTER TABLE "recepcion" ADD CONSTRAINT "recepcion_fk0" FOREIGN KEY ("cli_fk") REFERENCES "clientes"("cli_pk");
ALTER TABLE "recepcion" ADD CONSTRAINT "recepcion_fk1" FOREIGN KEY ("emp_fk") REFERENCES "empleados"("emp_pk");
ALTER TABLE "recepcion" ADD CONSTRAINT "recepcion_fk2" FOREIGN KEY ("cat_fk") REFERENCES "categorias"("cat_pk");
ALTER TABLE "recepcion" ADD CONSTRAINT "recepcion_fk3" FOREIGN KEY ("pro_fk") REFERENCES "productos"("pro_pk");
ALTER TABLE "recepcion" ADD CONSTRAINT "recepcion_fk4" FOREIGN KEY ("est_fk") REFERENCES "estado"("est_pk");
ALTER TABLE "recepcion" ADD CONSTRAINT "recepcion_fk5" FOREIGN KEY ("dia_fk") REFERENCES "diagnostico"("dia_pk");

ALTER TABLE "clientes" ADD CONSTRAINT "clientes_fk0" FOREIGN KEY ("usu_fk") REFERENCES "usuarios"("usu_pk");

ALTER TABLE "lista_piezas" ADD CONSTRAINT "lista_piezas_fk0" FOREIGN KEY ("pie_fk") REFERENCES "piezas"("pie_pk");



ALTER TABLE "entrega" ADD CONSTRAINT "entrega_fk0" FOREIGN KEY ("rec_fk") REFERENCES "recepcion"("rec_pk");
ALTER TABLE "entrega" ADD CONSTRAINT "entrega_fk1" FOREIGN KEY ("emp_fk") REFERENCES "empleados"("emp_pk");


ALTER TABLE "diagnostico" ADD CONSTRAINT "diagnostico_fk0" FOREIGN KEY ("emp_fk") REFERENCES "empleados"("emp_pk");
ALTER TABLE "diagnostico" ADD CONSTRAINT "diagnostico_fk1" FOREIGN KEY ("sol_fk") REFERENCES "solucion"("sol_pk");

