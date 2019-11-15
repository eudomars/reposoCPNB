<?php
const SERVERS = "192.168.8.10 options='--client_encoding=UTF8'";
// const SERVER = "localhost options='--client_encoding=UTF8'";
const DBNAMES = 'sigefirrhh';
const DBUSERS = 'postgres';
const DBPASSS = '1qaz2wsx';
const DBPORTS = 5432; // Solo para base de datos PostgreSQL

const SGBDS = 'pgsql:host='.SERVERS.';port='.DBPORTS.';dbname='.DBNAMES;