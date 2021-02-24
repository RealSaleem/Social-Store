@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-list2"></i> <span class="font-weight-semibold">{{trans('site.ads')}}</h4>
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
                    <a class="btn btn-primary" href="{{route('ads.create')}}"><i class="icon-list2"></i> &nbsp; {{trans('site.add_ads')}}</a>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table datatable-basic table-bordered" data-order='[[0,"desc"]]'>
                        <thead>
                            <tr>
                                <th>{{trans('site.id')}}</th>
                                <th>{{trans('site.user_name')}}</th>
                                <th>{{trans('site.product_name_en')}}</th>
                                <th>{{trans('site.product_name_ar')}}</th>
                                <th>{{trans('site.price')}}</th>
                                <!-- <th>{{trans('site.description_en')}}</th>
                                <th>{{trans('site.description_ar')}}</th> -->
                                <!-- <th>{{trans('site.image')}}</th> -->
                                <th>{{trans('site.type')}}</th>
                                <th>{{trans('site.duration_days')}}</th>
                                <th>{{trans('site.sold_to')}}</th>
                                <th>{{trans('site.selling_price')}}</th>
                                <!-- <th>{{trans('site.created_at')}}</th> -->
                                <th class="text-center">{{trans('site.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ads as $ad)
                            <tr>
                                <td>{{$ad->id}}</td>
                                <td>{{isset($ad->appuser->user_name) ? $ad->appuser->user_name : ''}}</td>
                                <td>{{$ad->product_name_en}}</td>
                                <td>{{$ad->product_name_ar}}</td>
                                <td>{{$ad->price}}</td>
                                <!-- <td>{{$ad->description_en}}</td>
                                <td>{{$ad->description_ar}}</td> -->
                                <!-- <td>
                                    @foreach($ad->images as $image)
                                    <img src="{{$image->url}}" style="width: 100px; height: auto;" />
                                    @endforeach
                                </td> -->
                                <td>{{$ad->type}}</td>
                                <td>{{$ad->duration}} {{trans('site.days')}}</td>
                                <td>{{$ad->user_id_sold}}</td>
                                <td>{{$ad->sold_price}}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{route('ads.edit',$ad->id)}}" class="dropdown-item"><i class="icon-pen6"></i> {{trans('site.edit_ads')}}</a>
                                                <a href="{{route('ads.show',$ad->id)}}" class="dropdown-item"><i class="icon-file-eye2"></i> {{trans('site.view_details')}}</a>
                                                <form action="{{route('ads.destroy', $ad->id)}}" method="POST" class="delete-record">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="dropdown-item"><i class="icon-bin"></i> {{trans('site.delete_ads')}}</button>
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