@if (isset($data) and !@empty($data) and count($data) > 0)
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>اسم الطالب</th>
                                <th>الهاتف </th>
                                <th>العنوان </th>
                                <th>الصورة </th>
                                <th>رقم الوهوية </th>
                                <th>ملاحظات </th>
                                <th>التفعيل </th>
                                <th>الاضافة </th>
                                <th>التحديث </th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->phone }}</td>
                                    <td>{{ $info->address }}</td>
                                    <td><img src="{{ asset('uploads/' . $info->image) }}"
                                            style="width: 70px;height: 70px; ">
                                    </td>
                                    <td>{{ $info->nationalID }}</td>
                                    <td>{{ $info->notes }}</td>
                                    <td>
                                        @if ($info->active == 1)
                                            مفعل
                                        @else
                                            غير مفعل
                                        @endif
                                    </td>

                                    <td>{{ $info->created_at }}</td>
                                    <td>{{ $info->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('student.edit', $info->id) }}"
                                            class="btn btn-sm btn-success">تعديل</a>
                                        <a href="{{ route('student.destroy', $info->id) }}"
                                            class="btn btn-sm btn-danger">حذف</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p style="text-align: center;color: brown;margin-top: 10px">عفواً لا توجد بيانات لعرضها</p>
                @endif
