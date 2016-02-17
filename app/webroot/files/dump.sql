--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: gggg; Type: TABLE; Schema: public; Owner: david; Tablespace: 
--

CREATE TABLE gggg (
    id integer NOT NULL,
    nom character varying(20)
);


ALTER TABLE public.gggg OWNER TO david;

--
-- Name: gggg_id_seq; Type: SEQUENCE; Schema: public; Owner: david
--

CREATE SEQUENCE gggg_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gggg_id_seq OWNER TO david;

--
-- Name: gggg_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: david
--

ALTER SEQUENCE gggg_id_seq OWNED BY gggg.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: david; Tablespace: 
--

CREATE TABLE usuarios (
    id integer NOT NULL,
    nombre character varying(60)
);


ALTER TABLE public.usuarios OWNER TO david;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: david
--

CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_seq OWNER TO david;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: david
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: david
--

ALTER TABLE ONLY gggg ALTER COLUMN id SET DEFAULT nextval('gggg_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: david
--

ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- Data for Name: gggg; Type: TABLE DATA; Schema: public; Owner: david
--

INSERT INTO gggg VALUES (1, 'vdrfvrve');
INSERT INTO gggg VALUES (2, 'vr4gefre');


--
-- Name: gggg_id_seq; Type: SEQUENCE SET; Schema: public; Owner: david
--

SELECT pg_catalog.setval('gggg_id_seq', 2, true);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: david
--

INSERT INTO usuarios VALUES (1, 'vvvgvgg');


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: david
--

SELECT pg_catalog.setval('usuarios_id_seq', 1, true);


--
-- Name: gggg_pkey; Type: CONSTRAINT; Schema: public; Owner: david; Tablespace: 
--

ALTER TABLE ONLY gggg
    ADD CONSTRAINT gggg_pkey PRIMARY KEY (id);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: david; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

