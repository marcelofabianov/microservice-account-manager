curl --location --request PUT 'http://localhost:8007/api/v1/accounts/11' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--data-raw '{
  "document": "2345234533453",
  "name": "Agroshop",
  "email": "contato@agroshop.com.br",
  "phone": "(34) 5734-1084",
  "address": "455 Arely Bypass",
  "addressNumber": "432",
  "addressComplement": "Apt. 899"
}'
