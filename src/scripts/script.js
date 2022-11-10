function changeSize()
{
    var container = document.getElementById("container");
    var log_in = document.getElementById("log-in");
    var results = document.getElementById("results");
    var count = container.clientHeight + (results.clientHeight)/2;

    container.setAttribute("style", "height: " + count + "px");
    log_in.setAttribute("style", "height: " + container.clientHeight + "px");
}