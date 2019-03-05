<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $jumlahbuku }}</h3>
          <p>Jumlah Buku</p>
        </div>
        <div class="icon">
          <i class="fa fa-book"></i>
        </div>
        <a href="{{ url('buku') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ $jumlahanggota }}</h3>
          <p>Jumlah Anggota</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ url('anggota') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ $jumlahpinjam }}</h3>

          <p>Jumlah Peminjam Buku</p>
        </div>
        <div class="icon">
          <i class="fa fa-shopping-cart"></i>
        </div>
        <a href="{{ url('pinjam') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $jumlahanggota }}</h3>

              <p>Laporan Anggota</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="{{ url('report/anggota') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
  </div>
  <!-- /.row -->
    <!-- quick email widget -->
      <!-- <form id="frmMemo" class="form-horizontal" action="{{ url('memo/save') }}" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-pencil"></i>

                  <h3 class="box-title">Do you want to Leave Memo ?</h3> -->
                  <!-- tools box -->
                  <!-- <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div> -->
                  <!-- /. tools -->
                <!-- </div>
                <div class="col-md-12">
                  <div class="box-body">  
                    <div class="form-group">
                      <input type="text" class="form-control" name="nama" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                      <div>
                        <textarea class="textarea" placeholder="Your Comment"
                                  style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer clearfix">
                    <button type="submit" class="btn btn-primary pull-right">Send</button>
                </div>
              </div>
            </div>
          </div>
        </form> -->
          <div class="row">
            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <li>
                      <img src="{{ asset('img/yesung04.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">Yesung</a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <li>
                      <img src="{{ asset('img/kyuhyun-super-junior-_121116174131-640.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">Kyuhyun</a>
                      <span class="users-list-date">Yesterday</span>
                    </li>
                    <li>
                      <img src="{{ asset('img/main-qimg-e03e516a5d6fee7ab03073e8102136d1.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">IU</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="{{ asset('img/yd.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">Yoseob</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="{{ asset('img/Suga.full.143453.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">Suga</a>
                      <span class="users-list-date">13 Jan</span>
                    </li>
                    <li>
                      <img src="{{ asset('img/Jisoo.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">Jisoo</a>
                      <span class="users-list-date">14 Jan</span>
                    </li>
                    <li>
                      <img src="{{ asset('img/Ji-Eun-Tak.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">Ji Eun</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                      <img src="{{ asset('img/1-Seohyun.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">Seohyun</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{ url('user') }}">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>

       <!-- /.box -->
            
      <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Information</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="{{ url('buku') }}"><i class="fa fa-book"></i> Buku
                  <span class="label label-primary pull-right">{{ $jumlahbuku }}</span></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                </span></a>
                </li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                <li><a href="{{ url('report/buku') }}"><i class="fa  fa-file-text-o"></i> Report Buku</a></li>
                <li><a href="{{ url('report/anggota') }}"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right"></span></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
    </div>
    
</div>
  

</section>