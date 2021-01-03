#!/bin/bash

URL=$(oc get route.serving.knative.dev -o json | jq -r '.items[0].status.url')

while true; do
  curl $URL 
  echo ""
  sleep 0.5
done
