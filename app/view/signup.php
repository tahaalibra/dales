@import(bootstrap.header)
<style>
body{
padding-top: 100px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            ${{message}}
            <form action="" method="POST">
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"></span>
                    <input type="text" class="form-control" placeholder="Username" name="username" aria-describedby="sizing-addon1">
                </div>
                <br>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"></span>
                    <input type="text" class="form-control" placeholder="Password" name="password" aria-describedby="sizing-addon1">
                </div>
                <br>
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="submit" class="btn btn-default">SignUp</button>
                    </div>
                </div>
            </form>
            <br>
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <a href="home"><button type="button" class="btn btn-default">Home</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@import(bootstrap.footer)