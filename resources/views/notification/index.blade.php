@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-bubbles3"></i> <span class="font-weight-semibold">{{trans('site.notifications')}}</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
@include('layouts.flash-message')
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-xl-12">
            <div class="actions mb-2">
                <div class="text-right">
                    <a class="btn btn-primary" href="{{route('notification.create')}}"><i class="icon-bubbles3"></i> &nbsp; {{trans('site.send_notification')}}</a>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table datatable-basic table-bordered" data-order='[[0,"desc"]]'>
                        <thead>
                            <tr>
                                <th>{{trans('site.id')}}</th>
                                <th>{{trans('site.message_title')}}</th>
                                <th>{{trans('site.message_body')}}</th>
                                <th>{{trans('site.notification_image')}}</th>
                                <th>{{trans('site.url')}}</th>
                                <th>{{trans('site.date_time')}}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notification as $notification)
                            <tr>
                                <td>{{$notification->id}}</td>
                                <td>{{$notification->title}}</td>
                                <td>{{$notification->description}}</td>
                                <td><img src="{{asset('storage/'.$notification->image)}}" style="width: 100px; height: auto;" /></td>
                                <td>{{$notification->url}}</td>
                                <td>{{date('d M Y h:i:s A',strtotime($notification->date))}}</td>
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
<script>
    $(document).ready(function() {
        // $('.datatable-basic').DataTable();
    });

    var DatatableBasic = function() {


        //
        // Setup module components
        //

        // Basic Datatable examples
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
                    targets: [5]
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