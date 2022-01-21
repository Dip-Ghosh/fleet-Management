<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box" style="background-color: #c9f7f5">
            <div class="inner">
                <h3>{{(isset($userCount['activeUserCount']) && $userCount['activeUserCount']>0 )?$userCount['activeUserCount']:0}}</h3>

                <p style="font-weight: bold;font-size: 20px">Active User</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>

        </div>
    </div>


    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box" style="background-color: #e1e9ff">
            <div class="inner">
                <h3>{{(isset($userCount['inActiveUserCount']) && $userCount['inActiveUserCount']>0 )?$userCount['inActiveUserCount']:0}}</h3>

                <p style="font-weight: bold;font-size: 20px">Inactive User</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>

        </div>
    </div>


    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box" style="background-color: #fff4de">
            <div class="inner">
                <h3>{{(isset($userCount['pendingUserCount']) && $userCount['pendingUserCount']>0 )?$userCount['pendingUserCount']:0}}</h3>

                <p style="font-weight: bold;font-size: 20px">Pending User</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>

</div>




