#!/bin/bash
curl --location --request POST 'http://localhost:8007/api/v1/accounts' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--data-raw '{
  "document": "2345234533453",
  "name": "Marcelo Fabiano Company",
  "email": "contact@marcelofabiano.com",
  "phone": "(73) 5734-1084",
  "address": "455 Arely Bypass",
  "addressNumber": "432",
  "addressComplement": "Apt. 899"
}'
