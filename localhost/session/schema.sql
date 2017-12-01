CREATE TABLE "users" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "user" text NOT NULL,
  "password" text NOT NULL
, "name" text NULL);

CREATE TABLE "logins" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "user_id" integer NOT NULL,
  "logon" text NOT NULL,
  "ip" text NOT NULL,
  "ua" text NOT NULL,
  FOREIGN KEY ("user_id") REFERENCES "users" ("id")
);
