@extends('layouts.admin-head')
@section('title', 'Landing page templates')
@section('content')
    <style>
        .prfile-photo {
            height: 180px;
            overflow: hidden;
        }

        .form-check-input:checked[type=radio]+label {
            background: none !important;
            color: unset !important;
        }

        label {
            width: 80%;
        }

        .select2-container .select2-selection--multiple {
            min-height: unset;
        }

        .select2-dropdown {
            width: 100px !important;
            z-index: 111111111;
        }

        .select2-container {
            width: 100% !important;
        }
    </style>
    <div class="dash-cont-table admin-dash-cont-table">
        <div class="row">
            <div class="col-8">
                <h1>Landing Page Templates</h1>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="btns-wrap">
                    <!-- <a href="../dashboard.html" class="btn btn-prim btn-prim-trans">Close</a> -->
                    <a href="{{ route('admin-panel.templates') . '/?cat=1' }}"
                        class="btn btn-prim btn-prim-head add-new-tag-btn new-form-btn">+ New Landing Page</a>
                </div>
            </div>
        </div>

        <div class="campaigns-tables setting-admin-tables">
            <div class="campaigns-tables-wrap admin-form-template-table px-0">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="form-template-head">
                            <table class="w-100">
                                <thead>
                                    <tr>
                                        <th></th>
                                        {{-- <th>
                                            <span>Tags</span>
                                        </th>
                                        <th>
                                            <span>Price</span>
                                        </th>
                                        <th>
                                            <span>Status</span>
                                        </th>
                                        <th>
                                            <span>Type</span>
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 120px">
                                            <div class="search-container input-group-icon">
                                                <input class="form-control" type="text" id="search"
                                                    placeholder="Search template" />

                                                <span class="icon-sear">
                                                    <img src="{{ asset('website') }}/images/search.svg" alt="" />
                                                </span>
                                            </div>
                                        </td>
                                        <td style="width: 220px" class="d-none">
                                            <div class="tag-td">
                                                <ul class="tags-form-tem">
                                                    <li>
                                                        reduce_cart_abandonment
                                                        <span class="tag-remove"><img
                                                                src="{{ asset('website') }}/images/delet-bin-red.svg"
                                                                alt="" /></span>
                                                    </li>
                                                    <li>
                                                        grow_email_list
                                                        <span class="tag-remove"><img
                                                                src="{{ asset('website') }}/images/delet-bin-red.svg"
                                                                alt="" /></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>

                                        <td class="d-none">
                                            <div class="select-wrap-wrap w-100">
                                                <select name="" id="">
                                                    <option value="">
                                                        Free
                                                    </option>
                                                    <option value="">
                                                        0ption2
                                                    </option>
                                                    <option value="">
                                                        option3
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="d-none">
                                            <div class="select-wrap-wrap w-100">
                                                <select name="" id="">
                                                    <option value="">
                                                        Live
                                                    </option>
                                                    <option value="">
                                                        0ption2
                                                    </option>
                                                    <option value="">
                                                        option3
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="d-none">
                                            <div class="select-wrap-wrap w-100">
                                                <select name="" id="">
                                                    <option value="">
                                                        Simple
                                                    </option>
                                                    <option value="">
                                                        0ption2
                                                    </option>
                                                    <option value="">
                                                        option3
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="d-none">
                                            <div class="sort-by-btn">
                                                <button class="sort-sort-btn">
                                                    <img src="{{ asset('website') }}/images/sort-by-btn-icon.svg"
                                                        alt="" />Sort By
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont-tabs-inner accordian-settings-wrap form-template-inner-cont">
                <div class="form-template-boxes">
                    <div class="row">

                        @foreach ($templates as $template)
                            <div class="form-template-box col-4 m-2">

                                <div class="form-t-one-cont">
                                    <div class="prfile-photo">
                                        <img src="{{ $template->image }}" alt="" />
                                    </div>
                                    <div class="description-form-tem">
                                        <h4>{{ $template->name }}</h4>
                                    </div>
                                    <div class="links-btn-wrap text-center">
                                        <a href="javscript:void(0);" data-bs-toggle="modal" data-bs-target="#editModal"
                                            onclick="editT('{{ $template->id }}')"><img
                                                src="{{ asset('design') }}/images/edit-icon-form.svg"
                                                alt="" />Edit</a>
                                        <a href="javscript:void(0);" onclick="duplicateT('{{ $template->id }}')"><img
                                                src="{{ asset('design') }}/images/duplicate-icon-form.svg"
                                                alt="" />Duplicate</a>
                                        <a href="javscript:void(0);" onclick="deleteT('{{ $template->id }}')"><img
                                                src="{{ asset('design') }}/images/delete-icon-form.svg"
                                                alt="" />Delete</a>
                                    </div>
                                    <div class="form-checked-end-wrap d-flex my-3">
                                        <div class="form-check col-5">
                                            <label for="prem{{ $template->id }}">
                                                <input class="form-check-input scope" type="radio"
                                                    data-temp="{{ $template->id }}" name="scope[{{ $template->id }}]"
                                                    value="global" {{ is_null($template->scope_ids) ? 'checked' : '' }}
                                                    id="prem{{ $template->id }}" />

                                                Global</label>
                                        </div>
                                        <div class="form-check col-7">
                                            <input class="form-check-input scope" type="radio"
                                                name="scope[{{ $template->id }}]" value="accounts"
                                                id="check{{ $template->id }}"
                                                {{ !is_null($template->scope_ids) ? 'checked' : '' }} />
                                            <label for="check{{ $template->id }}">Accounts
                                                <select name="account" id="scope_id_{{ $template->id }}" class="select2"
                                                    multiple="multiple"
                                                    onchange="setScope.call(this, '{{ $template->id }}')">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">
                                                            {{ 'userID #' . $user->id }}</option>
                                                    @endforeach
                                                </select>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1100px">
            <div class="modal-content dashboard-cont-wrap p-0">
                <div class="modal-header"
                    style="    position: absolute; display:none;
                top: 25px;
                right: 0;
                z-index: 9999;">
                    <button type="button" class="btn-close h2" data-bs-dismiss="modal"
                        aria-label="Close">&times;</button>
                </div>
                <div class="modal-body p-2">

                    <div class="unlayer-block">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        function deleteT(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Deleting this template will not be restored!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ url('admin-panel/delete-template/') }}/" + id;
                }

            });
        }

        function duplicateT(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Duplicate this template?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Duplicate!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ url('admin-panel/duplicate-template/') }}/" + id;
                }

            });
        }

        function editT(id) {
            $.ajax({
                url: "{{ route('admin-template.getTemplate.post') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                },
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('.unlayer-block').html(response.url);
                },
                error: function(error) {
                    toastr.error(error);
                }

            });
        }

        function setScope(temp_id) {
            $.ajax({
                url: "{{ route('setScope.post') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'temp_id': temp_id,
                    'user_ids': $(this).val(),
                    'scope': 'accounts'
                },
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    //   $('.unlayer-block').html(response.url);
                },
                error: function(error) {
                    //   toastr.error(error);
                }

            });
        }
        $("#search").on("keyup", function() {
            var filter = $(this).val(),
                count = 0;
            // Loop through the comment list
            $('.form-template-boxes>.row .form-template-box').each(function() {
                // If the list item does not contain the text phrase fade it out
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).hide(); // MY CHANGE
                    // Show the list item if the phrase matches and increase the count by 1
                } else {
                    $(this).show(); // MY CHANGE
                    count++;
                }
            });
        });
        $('.scope').on('change', function() {
            var temp_id = $(this).data('temp');
            if ($(this).val() == 'global') {
                $.ajax({
                    url: "{{ route('setScope.post') }}",
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'temp_id': temp_id,
                        'user_ids': '',
                        'scope': 'global'
                    },
                    dataType: "JSON",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        //   $('.unlayer-block').html(response.url);
                    },
                    error: function(error) {
                        //   toastr.error(error);
                    }
                });
            }
        });
    </script>
    @foreach ($templates as $template)
        <script>
            $(function() {
                $("#scope_id_{{ $template->id }}").val([{{ $template->scope_ids }}]).trigger('change');
            })
        </script>
    @endforeach

@endsection
