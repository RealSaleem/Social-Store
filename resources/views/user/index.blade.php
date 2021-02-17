@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-users4"></i> <span class="font-weight-semibold">{{trans('site.app_users')}}</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <!-- Dashboard content -->
    <div class="row">
        <div class="col-xl-12">
            <div class="actions mb-2">
                <div class="text-right">
                    <a class="btn btn-primary" href="{{route('user.create')}}"><i class="icon-users4"></i> &nbsp; {{trans('site.add_app_user')}}</a>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table datatable-basic table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>{{trans('site.id')}}</th>
                                <th>{{trans('site.user_name')}}</th>
                                <th>{{trans('site.first_name')}}</th>
                                <th>{{trans('site.last_name')}}</th>
                                <th>{{trans('site.email')}}</th>
                                <th>{{trans('site.image')}}</th>
                                <th>{{trans('site.phone')}}</th>
                                <th>{{trans('site.country')}}</th>
                                <th>{{trans('site.category')}}</th>
                                <!-- <th>{{trans('site.created_at')}}</th> -->
                                <th class="text-center">{{trans('site.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appusers as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->user_name}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td><img src="{{asset('storage/'.$user->image)}}" style="width: 100px; height: auto;" /></td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->country->name_en}}</td>
                                <td>{{$user->category->name_en}}</td>
                                <!-- <td>{{date('d M Y h:i:s A',strtotime($user->created_at))}}</td> -->
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{route('user.edit',$user->id)}}" class="dropdown-item"><i class="icon-pen6"></i> {{trans('site.edit_app_user')}}</a>
                                                <a href="{{route('bids.index')}}" class="dropdown-item"><i class="fas fa-gavel"></i> {{trans('site.view_bids')}}</a>
                                                <a href="{{route('stories.index')}}" class="dropdown-item"><i class="fas fa-book"></i> {{trans('site.view_stories')}}</a>
                                                <form action="{{route('user.destroy', $user->id)}}" method="POST" class="delete-record">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="dropdown-item"><i class="icon-bin"></i> {{trans('site.delete_app_user')}}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->

</div>
<!-- /content area -->
@endsection
@section('script')
<!-- Jquery download pdf excel and csv scripts -->
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script>
    $('#users-table').DataTable({
        'scrollX':true,
        'dom': 'Bfrtip',
        'buttons': [
            {
                extend: 'excel',
                text: 'Excel',
                className: 'btn waves-effect waves-light invoice-export border-round',
                exportOptions: {
                columns: [0,1,2,3,4,6,7,8]
                } 
            },
            {
                extend: 'csv',
                text: 'CSV',
                className: 'btn waves-effect waves-light invoice-export border-round',
                exportOptions: {
                columns: [0,1,2,3,4,6,7,8]
                } 
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'btn waves-effect waves-light invoice-export border-round',
                exportOptions: {
                columns: [0,1,2,3,4,6,7,8]
                } 
            }
        ]
    });
</script>
<script>
    $(document).ready(function() {
        // $('.datatable-basic').DataTable();
    });
    var DatatableBasic = function() {
        var _componentDatatableBasic = function() {
            if (!$().DataTable) {
                console.warn('Warning - datatables.min.js is not loaded.');
                return;
            }
            // Setting datatable defaults
            $.extend($.fn.dataTable.defaults, {
                autoWidth: false,
                columnDefs: [{
                    orderable: false,
                    width: 100,
                    targets: [9]
                }],
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: {
                        'first': 'First',
                        'last': 'Last',
                        'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                        'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
                    }
                }
            });
            // Basic datatable
            $('.datatable-basic').DataTable();
            // Alternative pagination
            $('.datatable-pagination').DataTable({
                pagingType: "simple",
                language: {
                    paginate: {
                        'next': $('html').attr('dir') == 'rtl' ? 'Next &larr;' : 'Next &rarr;',
                        'previous': $('html').attr('dir') == 'rtl' ? '&rarr; Prev' : '&larr; Prev'
                    }
                }
            });
            // Datatable with saving state
            $('.datatable-save-state').DataTable({
                stateSave: true
            });
            // Scrollable datatable
            var table = $('.datatable-scroll-y').DataTable({
                autoWidth: true,
                scrollY: 300
            });

            // Resize scrollable table when sidebar width changes
            $('.sidebar-control').on('click', function() {
                table.columns.adjust().draw();
            });
        };
        // Select2 for length menu styling
        var _componentSelect2 = function() {
            if (!$().select2) {
                console.warn('Warning - select2.min.js is not loaded.');
                return;
            }

            // Initialize
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity,
                dropdownAutoWidth: true,
                width: 'auto'
            });
        };
        //
        // Return objects assigned to module
        //
        return {
            init: function() {
                _componentDatatableBasic();
                _componentSelect2();
            }
        }


    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        DatatableBasic.init();
    });
</script>
<script>
    $('.delete-record').submit(function(e) {
        e.preventDefault();
        // console.log('safsa');
        swal({
                title: "{{trans('site.alert')}}",
                text: "{{trans('site.alert_message')}}",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: {
                    cancel: {
                        text: "{{trans('site.cancel')}}",
                        value: false,
                        visible: true,
                        className: ""
                    },
                    confirm: {
                        text: "{{trans('site.ok')}}",
                        value: true,
                        visible: true,
                        className: ""
                    }
                },
                closeOnClickOutside: false
            })
            .then((isConfirm) => {
                if (isConfirm) {
                    this.submit();
                    return true;
                } else {
                    return false;
                }
            });
    });
</script>
@endsection