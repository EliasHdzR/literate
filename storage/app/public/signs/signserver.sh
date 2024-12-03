#!/bin/bash
read password
read key
read cer
read now
read user
read cadenaOriginal

#Creando llaves
openssl rsa -inform DER -in $key -out "private_$now.pem" -passin pass:$password
openssl x509 -in $cer -inform DER -outform PEM -out "certificate_$now.pem" 

if [ ! -e "llaves.p12" ]; then
    openssl pkcs12 -export -inkey "private_$now.pem" -in "certificate_$now.pem" -name $user -out llaves.p12 -passout pass:123tamarindo
    #cp nuevo.p12 llaves.p12
    chmod a+r llaves.p12
else
  openssl pkcs12 -export -inkey "private_$now.pem" -in "certificate_$now.pem" -name $user -out nuevo.p12 -passout pass:123tamarindo
  chmod a+r nuevo.p12
  keytool -importkeystore \
  -srckeystore nuevo.p12 \
  -srcstoretype PKCS12 \
  -destkeystore llaves.p12 \
  -deststoretype PKCS12 \
  -srcalias $user \
  -destalias $user \
  -srcstorepass 123tamarindo \
  -deststorepass 123tamarindo
fi

echo -n $cadenaOriginal | openssl dgst -sha256 -sign "private_$now.pem" -out "firma_$now.sig"

rm "private_$now.pem" "certificate_$now.pem" "private_$now.key" "public_$now.cer"
rm nuevo.p12

