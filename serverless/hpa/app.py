#!/usr/bin/python
from flask import Flask, request, jsonify, make_response
import requests
import time
from multiprocessing import Pool
from multiprocessing import cpu_count


application = Flask(__name__)

@application.route('/healthz')
def healthz():
    return make_response(jsonify({"health": "ok"}), 200)

@application.route('/memory/<int:size>/<int:time>')
def memory(size, time):
    size = size
    seconds = time*60

    try:
      dummy = ' ' * 1024 * 1024 * size
    except MemoryError:
      return make_response("Ran out of memory", 400)
    time.sleep(seconds)
    dummy = ''

    return make_response("", 200)

def f(x):
    timeout = time.time() + 60*float(set_time)  # X minutes from now
    start = time.time()
    message = 0
    while True:
        if (time.time() - start > 30) and (message == 1):
            yield "Generating CPU Load"
            message = 1
        if time.time() > timeout:
            break
        x*x

@application.route('/cpu/<int:time>')
def cpu(time):

    global set_time
    set_time = time
    processes = cpu_count()
    pool = Pool(processes)
    pool.map(f, range(processes))
    pool.close()
    return make_response("", 200)

if __name__ == '__main__':
     application.run(host='0.0.0.0',port=8080)
