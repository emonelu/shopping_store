from flask import *

import json, time

app = Flask(__name__)


@app.route("/", methods=["GET"])
def home():
    current_time = time.localtime()

    data = {
        "Page": "Home",
        "Message": "Success",
        "Time": time.strftime("%a, %d %b %Y %H:%M:%S GMT", current_time),
    }
    dump = json.dumps(data)

    return dump


@app.route("/users/", methods=["GET"])
def users():
    user_input = str(request.args.get("user"))  # /users/?user=USER_NAME
    data = {
        "Page": "Users Page",
        "Message": f"The request for {user_input}has been recieved",
        "Time": time.time(),
    }
    dump = json.dumps(data)

    return dump


@app.route("/products/", methods=["GET"])
def products():
    data = {"Page": "Products Page", "Message": "Success", "Time": time.time()}
    dump = json.dumps(data)

    return dump


@app.route("/transactions/", methods=["GET"])
def transactions():
    data = {"Page": "Transactions Page", "Message": "Success", "Time": time.time()}
    dump = json.dumps(data)

    return dump


if __name__ == "__main__":
    app.run(port=7776)
