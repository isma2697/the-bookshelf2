-- Create migrations table to keep track of migrations that have been run
CREATE TABLE IF NOT EXISTS "migrations" (
  "id" integer primary key autoincrement not null, 
  "migration" varchar not null, 
  "batch" integer not null
);

-- Create table to keep track of auto-increment IDs for other tables
CREATE TABLE sqlite_sequence(name,seq);

-- Create users table to store user information
CREATE TABLE IF NOT EXISTS "users" (
  "id" integer primary key autoincrement not null, 
  "name" varchar not null, 
  "surname" varchar not null, 
  "dni" varchar not null, 
  "phone" varchar not null, 
  "is_admin" tinyint(1) not null default '0', 
  "email" varchar not null, 
  "email_verified_at" datetime, 
  "password" varchar not null, 
  "remember_token" varchar, 
  "current_team_id" integer, 
  "profile_photo_path" varchar, 
  "created_at" datetime, 
  "updated_at" datetime, 
  "two_factor_secret" text, 
  "two_factor_recovery_codes" text, 
  "two_factor_confirmed_at" datetime
);
-- Add unique indexes to ensure unique email and dni values
CREATE UNIQUE INDEX "users_dni_unique" on "users" ("dni");
CREATE UNIQUE INDEX "users_email_unique" on "users" ("email");

-- Create table to store password reset tokens
CREATE TABLE IF NOT EXISTS "password_reset_tokens" (
  "email" varchar not null, 
  "token" varchar not null, 
  "created_at" datetime, 
  primary key ("email")
);

-- Create table to store failed jobs (used for queue processing)
CREATE TABLE IF NOT EXISTS "failed_jobs" (
  "id" integer primary key autoincrement not null, 
  "uuid" varchar not null, 
  "connection" text not null, 
  "queue" text not null, 
  "payload" text not null, 
  "exception" text not null, 
  "failed_at" datetime not null default CURRENT_TIMESTAMP
);
-- Add unique index to ensure unique UUID values
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs" ("uuid");

-- Create table to store personal access tokens
CREATE TABLE IF NOT EXISTS "personal_access_tokens" (
  "id" integer primary key autoincrement not null, 
  "tokenable_type" varchar not null, 
  "tokenable_id" integer not null, 
  "name" varchar not null, 
  "token" varchar not null, 
  "abilities" text, 
  "last_used_at" datetime, 
  "expires_at" datetime, 
  "created_at" datetime, 
  "updated_at" datetime
);
-- Add index to improve performance when searching by tokenable_type and tokenable_id
CREATE INDEX "personal_access_tokens_tokenable_type_tokenable_id_index" on "personal_access_tokens" ("tokenable_type", "tokenable_id");
-- Add unique index to ensure unique token values
CREATE UNIQUE INDEX "personal_access_tokens_token_unique" on "personal_access_tokens" ("token");

-- Create table to store user sessions
CREATE TABLE IF NOT EXISTS "sessions" (
  "id" varchar not null, 
  "user_id" integer, 
  "ip_address" varchar, 
  "user_agent" text, 
  "payload" text not null, 
  "last_activity" integer not null, 
  primary key ("id")
);
-- Add indexes to improve performance when searching by user
-- ID or last activity
CREATE INDEX "sessions_user_id_index" on "sessions" ("user_id");
CREATE INDEX "sessions_last_activity_index" on "sessions" ("last_activity");

-- Create books table to store information about books
CREATE TABLE IF NOT EXISTS "books" (
"id" integer primary key autoincrement not null,
"title" varchar not null,
"subtitle" varchar,
"published_date" date,
"page_count" integer,
"description" text,
"authors" text,
"categories" text,
"thumbnail" varchar,
"identifier" varchar,
"created_at" datetime,
"updated_at" datetime
);
-- Add index to improve performance when searching by title
CREATE INDEX "books_title_index" on "books" ("title");

-- Create comentarios table to store comments for books
CREATE TABLE IF NOT EXISTS "comentarios" (
"id" integer primary key autoincrement not null,
"users_id" integer not null,
"books_id" integer not null,
"comentario" text not null,
"created_at" datetime,
"updated_at" datetime,
foreign key("users_id") references "users"("id") on delete cascade,
foreign key("books_id") references "books"("id") on delete cascade
);

-- Create likes table to store likes for books
CREATE TABLE IF NOT EXISTS "likes" (
"id" integer primary key autoincrement not null,
"users_id" integer not null,
"books_id" integer not null,
"created_at" datetime,
"updated_at" datetime,
foreign key("users_id") references "users"("id") on delete cascade,
foreign key("books_id") references "books"("id") on delete cascade
);

-- Create reserves table to store book reservations
CREATE TABLE IF NOT EXISTS "reserves" (
"id" integer primary key autoincrement not null,
"users_id" integer not null,
"books_id" integer not null,
"fecha_reserva" date not null,
"fecha_vencimiento" date not null,
"created_at" datetime,
"updated_at" datetime,
foreign key("users_id") references "users"("id") on delete cascade,
foreign key("books_id") references "books"("id") on delete cascade
);

-- Create bookmarks table to store bookmarks for books
CREATE TABLE IF NOT EXISTS "bookmarks" (
"id" integer primary key autoincrement not null,
"users_id" integer not null,
"books_id" integer not null,
"created_at" datetime,
"updated_at" datetime,
foreign key("users_id") references "users"("id") on delete cascade,
foreign key("books_id") references "books"("id") on delete cascade
);
-- Add unique index to ensure that a user can only bookmark a book once
CREATE UNIQUE INDEX "bookmarks_users_id_books_id_unique" on "bookmarks" ("users_id", "books_id");

-- Create loans table to store book loans
CREATE TABLE IF NOT EXISTS "loans" (
"id" integer primary key autoincrement not null,
"users_id" integer not null,
"books_id" integer not null,
"loan_date" datetime not null,
"due_date" datetime,
"return_date" datetime,
"created_at" datetime,
"updated_at" datetime,
foreign key("users_id") references "users"("id") on delete cascade,
foreign key("books_id") references "books"("id") on delete cascade
);