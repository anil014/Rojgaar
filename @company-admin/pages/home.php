<style>


    .clock {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
        color: #17D4FE;
        font-size: 20px;
        font-family: Orbitron;
        letter-spacing: 7px;


    }
</style>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                
                    <div id="MyClockDisplay" class="clock"></div>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">

            <div class="col-md-6">

            </div>




        </div>

    </div>
    <script>
        function showTime(){
            var date = new Date();
            var h = date.getHours(); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59
            var session = "AM";

            if(h == 0){
                h = 12;
            }

            if(h > 12){
                h = h - 12;
                session = "PM";
            }

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

            var time = h + ":" + m + ":" + s + " " + session;
            document.getElementById("MyClockDisplay").innerText = time;
            document.getElementById("MyClockDisplay").textContent = time;

            setTimeout(showTime, 1000);

        }

        showTime();
    </script>
