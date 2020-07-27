--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.18
-- Dumped by pg_dump version 9.6.18

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: pages; Type: TABLE; Schema: public; Owner: sisadmin
--

CREATE TABLE public.pages (
    id integer NOT NULL,
    title character varying(100) NOT NULL,
    slug character varying(100) NOT NULL,
    body text
);


ALTER TABLE public.pages OWNER TO sisadmin;

--
-- Name: pages_id_seq; Type: SEQUENCE; Schema: public; Owner: sisadmin
--

CREATE SEQUENCE public.pages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pages_id_seq OWNER TO sisadmin;

--
-- Name: pages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sisadmin
--

ALTER SEQUENCE public.pages_id_seq OWNED BY public.pages.id;


--
-- Name: settings; Type: TABLE; Schema: public; Owner: sisadmin
--

CREATE TABLE public.settings (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    content text
);


ALTER TABLE public.settings OWNER TO sisadmin;

--
-- Name: settings_id_seq; Type: SEQUENCE; Schema: public; Owner: sisadmin
--

CREATE SEQUENCE public.settings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.settings_id_seq OWNER TO sisadmin;

--
-- Name: settings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sisadmin
--

ALTER SEQUENCE public.settings_id_seq OWNED BY public.settings.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: sisadmin
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(100),
    email character varying(100),
    password character varying(100),
    remember_token character varying(100),
    admin smallint DEFAULT 0 NOT NULL
);


ALTER TABLE public.users OWNER TO sisadmin;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: sisadmin
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO sisadmin;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sisadmin
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: visitors; Type: TABLE; Schema: public; Owner: sisadmin
--

CREATE TABLE public.visitors (
    id integer NOT NULL,
    ip character varying(100),
    date_access timestamp without time zone,
    page character varying(100)
);


ALTER TABLE public.visitors OWNER TO sisadmin;

--
-- Name: visitors_id_seq; Type: SEQUENCE; Schema: public; Owner: sisadmin
--

CREATE SEQUENCE public.visitors_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.visitors_id_seq OWNER TO sisadmin;

--
-- Name: visitors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sisadmin
--

ALTER SEQUENCE public.visitors_id_seq OWNED BY public.visitors.id;


--
-- Name: pages id; Type: DEFAULT; Schema: public; Owner: sisadmin
--

ALTER TABLE ONLY public.pages ALTER COLUMN id SET DEFAULT nextval('public.pages_id_seq'::regclass);


--
-- Name: settings id; Type: DEFAULT; Schema: public; Owner: sisadmin
--

ALTER TABLE ONLY public.settings ALTER COLUMN id SET DEFAULT nextval('public.settings_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: sisadmin
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: visitors id; Type: DEFAULT; Schema: public; Owner: sisadmin
--

ALTER TABLE ONLY public.visitors ALTER COLUMN id SET DEFAULT nextval('public.visitors_id_seq'::regclass);


--
-- Data for Name: pages; Type: TABLE DATA; Schema: public; Owner: sisadmin
--

COPY public.pages (id, title, slug, body) FROM stdin;
6	Linux	linux	<p><img src="http://127.0.0.1:8000/media/images/1594772507.jpeg" alt="" width="333" height="331" />Teste</p>
3	Cadastro	cadastro	Boni
2	Teste2	teste-2	<p><a href="https://www.google.com.br">Gostei</a></p><p>&nbsp;</p><p>&nbsp;</p><table style="border-collapse: collapse; width: 100%;" border="1"><tbody><tr><td style="width: 50%;"><span style="background-color: #e03e2d;">vfgfgfd</span></td><td style="width: 50%;">&nbsp;</td></tr></tbody></table><p>&nbsp;</p>
7	Sobre Mim	sobre-mim	c c vxcvxcvc
\.


--
-- Name: pages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sisadmin
--

SELECT pg_catalog.setval('public.pages_id_seq', 7, true);


--
-- Data for Name: settings; Type: TABLE DATA; Schema: public; Owner: sisadmin
--

COPY public.settings (id, name, content) FROM stdin;
1	title	Site muito Legal
3	email	contato@site.com
4	bgcolor	#d50b0b
5	textcolor	#00ffb3
2	subtitle	Criado por mim
\.


--
-- Name: settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sisadmin
--

SELECT pg_catalog.setval('public.settings_id_seq', 5, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: sisadmin
--

COPY public.users (id, name, email, password, remember_token, admin) FROM stdin;
15	Mila	mila@gmail.com	$2y$10$cl8GgsbYyc0SW27NEAwizuWhpqUnSzZtsKFtpuuTrwgBWHEPO1K92	FLGx0s8q8as5AfXgppIj2LNAAXKwcxqJLdFEDUqPzZ5mQaV1KIE8ZncFYHT8	0
1	Cissa Anjos	cissa.pmro@gmail.com	$2y$10$AhvoRmDtJcBMc62suBMmm.6xoLEBqIwV.PFXsFpfl46W2wwSp3Rsu	hbCC64kzdFGe9WGdegQHQM1KHbshN4cxq80G50da16aCi4BBsfkFPW0sEunU	1
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sisadmin
--

SELECT pg_catalog.setval('public.users_id_seq', 16, true);


--
-- Data for Name: visitors; Type: TABLE DATA; Schema: public; Owner: sisadmin
--

COPY public.visitors (id, ip, date_access, page) FROM stdin;
1	1	2020-07-15 20:56:00	/
2	2	2020-07-16 17:00:00	/
3	3	2020-07-18 15:00:00	/page
\.


--
-- Name: visitors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sisadmin
--

SELECT pg_catalog.setval('public.visitors_id_seq', 3, true);


--
-- Name: pages pages_pkey; Type: CONSTRAINT; Schema: public; Owner: sisadmin
--

ALTER TABLE ONLY public.pages
    ADD CONSTRAINT pages_pkey PRIMARY KEY (id);


--
-- Name: settings settings_pkey; Type: CONSTRAINT; Schema: public; Owner: sisadmin
--

ALTER TABLE ONLY public.settings
    ADD CONSTRAINT settings_pkey PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: sisadmin
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: visitors visitors_pkey; Type: CONSTRAINT; Schema: public; Owner: sisadmin
--

ALTER TABLE ONLY public.visitors
    ADD CONSTRAINT visitors_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

