@import(bootstrap.header)
<style>
body{
padding-top: 100px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter Query">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"> Run </button>
                </span>
            </div>
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default">Left</button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default">Right</button>
                </div>
            </div>
        </div>
    </div>
</div>
@import(bootstrap.footer)