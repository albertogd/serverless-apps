#!/usr/bin/python
from flask import Flask, request, jsonify, make_response
import requests
import time
import multiprocessing
#from multiprocessing import Pool
#from multiprocessing import cpu_count

import sys
sys.path.insert(0, 'utils')

from Monitor import MonitorThread
from Controller import ControllerThread
from closedLoopActuator import closedLoopActuator


application = Flask(__name__)

@application.route('/healthz')
def healthz():
    return make_response(jsonify({"health": "ok"}), 200)

@application.route('/memory')
def memory():
    size = 200
    seconds = 300

    try:
      dummy = ' ' * 1024 * 1024 * size
    except MemoryError:
      return make_response("Ran out of memory", 400)
    time.sleep(seconds)
    dummy = ''

    return make_response("", 200)

def f(x):
    loop_count = 1000 * 1024 * 250
    while loop_count > 0:
      x*x
      loop_count = loop_count - 1

@application.route('/cpu/<int:duration>/<float:cpuLoad>')
def cpu(duration, cpuLoad):

    cpu_core = 0
    monitor = MonitorThread(cpu_core, 0.1)
    monitor.start()

    control = ControllerThread(0.1)
    control.start()
    control.setCpuTarget(cpuLoad)

    actuator = closedLoopActuator(control, monitor, duration, cpu_core, cpuLoad/100, 0)
    actuator.run()
    actuator.close()

    monitor.running = 0;
    control.running = 0;
    monitor.join()
    control.join()

    return make_response("", 200)

if __name__ == '__main__':
     application.run(host='0.0.0.0',port=8080)
