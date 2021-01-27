#!/usr/bin/python
from flask import Flask, request, jsonify, make_response
import requests
from multiprocessing import Pool
from multiprocessing import cpu_count
import time

application = Flask(__name__)

@application.route('/healthz')
def healthz():
    return make_response(jsonify({"health": "ok"}), 200)


@application.route('/')
def cpu():

    cpus = cpu_count()
    print('Number of cpus available: %d' % cpu_count())
    print('-' * 20)
    print('Running load on CPU(s)')
    print('Utilizing %d cores' % cpus)
    print('-' * 20)
    pool = Pool(cpus)
    pool.map(f, range(cpus))
    pool.close()

    return make_response("", 200)

if __name__ == '__main__':
     application.run(host='0.0.0.0',port=8080)
