<?php

/**
 * @SWG\Definition(definition="MemberRegistration",
 * @SWG\Property(property="phone", type="string", example="0812345678"),
 * @SWG\Property(property="home_phone", type="string", example="02212345678"),
 * @SWG\Property(property="email", type="string", example="ulfims@gmail.com"),
 * @SWG\Property(property="name", type="string", example="Achmad Ulfi M.S."),
 * @SWG\Property(property="birth_date", type="string", example="1969-10-01"),
 * @SWG\Property(property="sex", type="string", example="M"),
 * @SWG\Property(property="long", type="number", example="-1.239293"),
 * @SWG\Property(property="lat", type="number", example="-1.239293"),
 * @SWG\Property(property="password", type="string", example="f4f287ed54b47519ff088552e9c85076824bdab8f6fa1da143994a2c421c5b385502448061ba018f93cae6ca2d5cff45c7edf04a6ccc483d87dfea5c5a134cbd", description="SHA512 format"),
  * )
 * @SWG\Definition(definition="ClientRegistration",
 * @SWG\Property(property="phone", type="string", example="0812345678"),
 * @SWG\Property(property="email", type="string", example="ulfims@gmail.com"),
 * @SWG\Property(property="name", type="string", example="Achmad Ulfi M.S."),
 * @SWG\Property(property="company", type="string", example="PT. Kerjaku"),
 * @SWG\Property(property="password", type="string", example="f4f287ed54b47519ff088552e9c85076824bdab8f6fa1da143994a2c421c5b385502448061ba018f93cae6ca2d5cff45c7edf04a6ccc483d87dfea5c5a134cbd", description="SHA512 format"),
  * )
  *
  * @SWG\Definition(definition="ResponseApiTemplate", type="object",
  *   @SWG\Property(property="status", type="integer", example="0"),
  *   @SWG\Property(property="message", type="string", example="Success")
  * )
  *
  * @SWG\Definition(definition="ResponseApiData",
  *   @SWG\Property(property="data", type="object")
  * )
  *
  * @SWG\Definition(definition="ResponseDataInitialize",
  *   @SWG\Property(property="code", type="string", example="afasdsadfsdf")
  * )
  *
  * @SWG\Definition(
  *   definition="ResponseApiId",
  *   allOf={
  *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
  *    @SWG\Schema(required={"data"}, type="object",
  *       @SWG\Property(property="data",type="object",
  *         @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0")
  *       )
  *    )
  *   }
  * )
  * @SWG\Definition(
  *   definition="ResponseInitStart",
  *   allOf={
  *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
  *    @SWG\Schema(required={"data"}, type="object",
  *       @SWG\Property(property="data",type="object",
  *         @SWG\Property(property="code", type="string", example="abcdefghijkl")
  *       )
  *    )
  *   }
  * )
  * @SWG\Definition(
  *   definition="RequestInitStart",
  *     @SWG\Property(property="application_id", type="string", example="123456",description="Application ID"),
  *     @SWG\Property(property="phone", type="string", example="0812345678"),
  *     @SWG\Property(property="phone_brand", type="string", example="Google"),
  *     @SWG\Property(property="phone_screen", type="string", example="5.5"),
  *     @SWG\Property(property="phone_os", type="string", example="Android"),
  *     @SWG\Property(property="phone_info", type="string", description="Additionnal Info ",example=""),
  *   required={
  *     "phone","phone_brand","phone_screen","phone_os","application_id"
  *   }
  * )
  * @SWG\Definition(definition="RequestInitVerify",
  * @SWG\Property(property="verification_code", type="string", example="eta123"),
   * )
   * @SWG\Definition(definition="MemberRegistrationExt",
   * @SWG\Property(property="phone", type="string", example="0812345678"),
   * @SWG\Property(property="current_salary", type="number", example="5000000"),
   * @SWG\Property(property="expected_salary", type="number", example="9000000"),
   * @SWG\Property(property="shift", type="boolean", example="1"),
   * @SWG\Property(property="job_type", type="string", example="FT"),
   * @SWG\Property(property="location", type="string", example="Bandung, Jakarta, Bekasi, Tangerang"),
   * @SWG\Property(property="address", type="string", example="Cipamokolan"),
    * )
   * @SWG\Definition(definition="MemberChangePassword",
   * @SWG\Property(property="current_password", type="string", example="423423423-fvsdfv3-23434345sdfsljdfhsldfjhlsdfg", description="SHA512 format"),
   * @SWG\Property(property="new_password", type="string", example="423423423-fvsdfv3-23434345sdfsljdfhsldfjhlsdfg", description="SHA512 format"),
    * )
   * @SWG\Definition(definition="ClientChangePassword",
   * @SWG\Property(property="current_password", type="string", example="423423423-fvsdfv3-23434345sdfsljdfhsldfjhlsdfg", description="SHA512 format"),
   * @SWG\Property(property="new_password", type="string", example="423423423-fvsdfv3-23434345sdfsljdfhsldfjhlsdfg", description="SHA512 format"),
    * )
    * @SWG\Definition(definition="PostCreate",
    * @SWG\Property(property="position", type="string", example="Manajeg", description="Posisi yang diinginkan"),
    * @SWG\Property(property="number_position", type="number", example="1", description="Jumlah Posisi yang diinginkan"),
    * @SWG\Property(property="job_description", type="string", example="Mengatur kegiatan sehari-hari dan laporan ke Direktur", description="Job Description"),
    * @SWG\Property(property="job_type", type="string", example="FT", description="FT=Full time, PT=Part Time"),
    * @SWG\Property(property="salary_type", type="number", example="1", description="1=per month,2= per week"),
    * @SWG\Property(property="salary_min", type="number", example="3000000", description="Minimum Gaji yang diajukan"),
    * @SWG\Property(property="salary_max", type="number", example="3000000", description="Maksimum Gaji yang diajukan"),
    * @SWG\Property(property="age_min", type="number", example="20", description="Umur minimum"),
    * @SWG\Property(property="age_max", type="number", example="30", description="Umur maksimum"),
    * @SWG\Property(property="sex", type="string", example="M", description="F=female, M=Male, A=All"),
    * @SWG\Property(property="english_speak", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
    * @SWG\Property(property="english_read", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
    * @SWG\Property(property="english_write", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
    * @SWG\Property(property="mandarin_speak", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
    * @SWG\Property(property="mandarin_read", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
    * @SWG\Property(property="mandarin_write", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
    * @SWG\Property(property="status", type="numeric", example="1", description="0=Draft,1=publish"),
    * @SWG\Property(property="client_location_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="ID Client Location"),
    * @SWG\Property(property="education_level", type="string", example="SMK", description="Jenjang Pendidikan"),
     * )
    * @SWG\Definition(definition="PostUpdate",
    * @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="ID Post"),
    * @SWG\Property(property="position", type="string", example="Manager", description="Posisi yang diinginkan"),
    * @SWG\Property(property="number_position", type="number", example="1", description="Jumlah Posisi yang diinginkan"),
    * @SWG\Property(property="job_description", type="string", example="Mengatur kegiatan sehari-hari dan laporan ke Direktur", description="Job Description"),
    * @SWG\Property(property="job_type", type="string", example="FT", description="FT=Full time, PT=Part Time"),
    * @SWG\Property(property="salary_type", type="number", example="1", description="1=per month,2= per week"),
    * @SWG\Property(property="salary_min", type="number", example="3000000", description="Minimum Gaji yang diajukan"),
    * @SWG\Property(property="salary_max", type="number", example="3000000", description="Maksimum Gaji yang diajukan"),
    * @SWG\Property(property="age_min", type="number", example="20", description="Umur minimum"),
    * @SWG\Property(property="age_max", type="number", example="30", description="Umur maksimum"),
    * @SWG\Property(property="sex", type="string", example="M", description="F=female, M=Male, A=All"),
    * @SWG\Property(property="english_speak", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
    * @SWG\Property(property="english_read", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
    * @SWG\Property(property="english_write", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
    * @SWG\Property(property="mandarin_speak", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
    * @SWG\Property(property="mandarin_read", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
    * @SWG\Property(property="mandarin_write", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
    * @SWG\Property(property="status", type="numeric", example="1", description="0=Draft,1=publish"),
    * @SWG\Property(property="client_location_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="ID Client Location"),
     * )
    * @SWG\Definition(definition="PostDelete",
    * @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     * )
     * @SWG\Definition(definition="JobTemplate",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="name", type="string", example="System Administrator", description=""),
     * )
    * @SWG\Definition(definition="JobTemplates",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/JobTemplatesData"),
    *   }
     * )
     * @SWG\Definition(definition="JobTemplatesData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/JobTemplate")
     *  )
     * )
     * @SWG\Definition(definition="Package",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="name", type="string", example="Package 1", description=""),
     *  @SWG\Property(property="value", type="numeric", example="50000", description=""),
     *  @SWG\Property(property="status", type="numeric", example="1", description=""),
     *  @SWG\Property(property="description", type="string", example="Hire Daily Casual Staff", description=""),
     *  @SWG\Property(property="post_numbers", type="numeric", example="10", description=""),
     *  @SWG\Property(property="credit", type="numeric", example="7", description=""),
     * )
    * @SWG\Definition(definition="Packages",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/PackagesData"),
    *   }
     * )
     * @SWG\Definition(definition="PackagesData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/Package")
     *  )
     * )
     * @SWG\Definition(definition="Post",
     * @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="ID Post"),
     * @SWG\Property(property="created_at", type="date", example="2018-02-01 00:01:02", description="Date Post"),
     * @SWG\Property(property="position", type="string", example="Manager", description="Posisi yang diinginkan"),
     * @SWG\Property(property="number_position", type="number", example="1", description="Jumlah Posisi yang diinginkan"),
     * @SWG\Property(property="job_description", type="string", example="Mengatur kegiatan sehari-hari dan laporan ke Direktur", description="Job Description"),
     * @SWG\Property(property="job_type", type="string", example="FT", description="FT=Full time, PT=Part Time"),
     * @SWG\Property(property="salary_type", type="number", example="1", description="1=per month,2= per week"),
     * @SWG\Property(property="salary", type="number", example="3000000", description="Gaji yang diajukan"),
     * @SWG\Property(property="age_min", type="number", example="20", description="Umur minimum"),
     * @SWG\Property(property="age_max", type="number", example="30", description="Umur maksimum"),
     * @SWG\Property(property="sex", type="string", example="M", description="F=female, M=Male, A=All"),
     * @SWG\Property(property="english_speak", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
     * @SWG\Property(property="english_read", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
     * @SWG\Property(property="english_write", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
     * @SWG\Property(property="mandarin_speak", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
     * @SWG\Property(property="mandarin_read", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
     * @SWG\Property(property="mandarin_write", type="string", example="G", description="N='NO',F='Fair',G='Good'"),
     * @SWG\Property(property="status", type="numeric", example="1", description="0=Draft,1=publish"),
     * @SWG\Property(property="client_location_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="ID Client Location"),
     * @SWG\Property(property="status_count",
     *       @SWG\Items(ref="#/definitions/PostUserStatus")
     * ),
     * @SWG\Property(property="location",
     *       @SWG\Items(ref="#/definitions/ClientLocation")
     *  ),
     * @SWG\Property(property="is_read", type="numeric", example="1", description="0=Not Read,1=read"),
    * )
    * @SWG\Definition(definition="PostUserStatus",
     * @SWG\Property(property="name", type="string", example="Ditolak"),
     * @SWG\Property(property="total", type="numeric", example="10"),
     * )
    * @SWG\Definition(definition="Posts",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/PostsData"),
    *   }
     * )
     * @SWG\Definition(definition="PostsData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/Post")
     *  )
     * )
     * @SWG\Definition(definition="Industry",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="name", type="string", example="Banking", description=""),
     * )
    * @SWG\Definition(definition="Industries",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/IndustriesData"),
    *   }
     * )
     * @SWG\Definition(definition="IndustriesData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/Industry")
     *  )
     * )
     * @SWG\Definition(definition="Location",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="name", type="string", example="Bandung", description=""),
     * )
    * @SWG\Definition(definition="Locations",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/LocationsData"),
    *   }
     * )nb
     * @SWG\Definition(definition="LocationsData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/Location")
     *  )
     * )
     * @SWG\Definition(definition="LocationDetail",
     *  @SWG\Property(property="location_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="name", type="string", example="Cipamokolan", description=""),
     * )
    * @SWG\Definition(definition="LocationDetails",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/LocationDetailsData"),
    *   }
     * )
     * @SWG\Definition(definition="LocationDetailsData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/LocationDetail")
     *  )
     * )
     *
     * @SWG\Definition(definition="News",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="created_at", type="string", example="2017-12-01", description=""),
     *  @SWG\Property(property="title", type="string", example="Kerjaku Resmi Diluncurkan", description=""),
     *  @SWG\Property(property="content", type="string", example="Isi Kerjaku Resmi Diluncurkan", description=""),
     * )
    * @SWG\Definition(definition="NewsLists",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/NewsListsData"),
    *   }
     * )
     * @SWG\Definition(definition="NewsListsData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/News")
     *  )
     * )
     * @SWG\Definition(definition="NewsLike",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="news_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="client_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="user_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="created_at", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     * )
    * @SWG\Definition(definition="NewsLikes",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/NewsLikesData"),
    *   }
     * )
     * @SWG\Definition(definition="NewsLikesData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/NewsLike")
     *  )
     * )

     * @SWG\Definition(definition="Comment",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="news_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="comment", type="string", example="Aplikasi kerjaku memang Ok", description=""),
     *  @SWG\Property(property="created_at", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="client",ref="#/definitions/CommentClient"),
     *  @SWG\Property(property="user",ref="#/definitions/CommentUser"),
     * )
    * @SWG\Definition(definition="Comments",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/CommentsData"),
    *   }
     * )
     * @SWG\Definition(definition="CommentsData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/Comment")
     *  )
     * )
     * @SWG\Definition(definition="ParameterId",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     * )
     * @SWG\Definition(definition="CommentUser",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="name", type="string", example="User Name", description=""),
     * )
     * @SWG\Definition(definition="CommentClient",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="name", type="string", example="Client Name", description=""),
     * )
     * @SWG\Definition(definition="ClientLocation",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="client_id", type="string", example="718cb7fe-c9bf-11e7-b626-5254005c6ff0", description="Client ID"),
     *  @SWG\Property(property="name", type="string", example="Kantor Pusat", description=""),
     *  @SWG\Property(property="address", type="string", example="Jl. Soekarno Hatta", description=""),
     *  @SWG\Property(property="location", type="string", example="Bandung", description=""),
     *  @SWG\Property(property="phone", type="string", example="02278373737", description=""),
     *  @SWG\Property(property="handphone", type="string", example="08170970468", description=""),
     * )
    * @SWG\Definition(definition="ClientLocations",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/ClientLocationsData"),
    *   }
     * )
     * @SWG\Definition(definition="ClientLocationsData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/ClientLocation")
     *  )
     * )
     * @SWG\Definition(definition="ClientLocationCreate",
     *  @SWG\Property(property="name", type="string", example="Kantor Pusat", description=""),
     *  @SWG\Property(property="address", type="string", example="Jl. Soekarno Hatta", description=""),
     *  @SWG\Property(property="location", type="string", example="Bandung", description=""),
     *  @SWG\Property(property="phone", type="string", example="02278373737", description=""),
     *  @SWG\Property(property="handphone", type="string", example="08170970468", description=""),
     * )
     * @SWG\Definition(definition="ClientLocationUpdate",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="name", type="string", example="Kantor Pusat", description=""),
     *  @SWG\Property(property="address", type="string", example="Jl. Soekarno Hatta", description=""),
     *  @SWG\Property(property="location", type="string", example="Bandung", description=""),
     *  @SWG\Property(property="phone", type="string", example="02278373737", description=""),
     *  @SWG\Property(property="handphone", type="string", example="08170970468", description=""),
     * )

     * @SWG\Definition(definition="Resume",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="name", type="string", example="Ulfi", description=""),
     *  @SWG\Property(property="phone", type="string", example="0811231xxx", description="Masked Phone"),
     *  @SWG\Property(property="email", type="string", example="ulxx@daxx.xxx", description="Masked Email"),
     *  @SWG\Property(property="status", type="numeric", example="0", description="0: Not Selected,1:Selected,2:Save"),
     * )
     * @SWG\Definition(definition="ResumeDetail",
     *  @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description=""),
     *  @SWG\Property(property="name", type="string", example="Ulfi", description=""),
     *  @SWG\Property(property="phone", type="string", example="0811231xxx", description="Masked Phone"),
     *  @SWG\Property(property="email", type="string", example="ulxx@daxx.xxx", description="Masked Email"),
     *  @SWG\Property(property="birth_date", type="string", example="1974-02-1", description="Birth Date"),
     *  @SWG\Property(property="address", type="string", example="Taman Sari Bukit Damai", description="Address"),
     *  @SWG\Property(property="height", type="numeric", example="158", description="Heght in cm"),
     *  @SWG\Property(property="weight", type="numeric", example="158", description="Weight in kg"),
     *  @SWG\Property(property="sex", type="string", example="M", description="Sex (F/M)"),
     *  @SWG\Property(property="location", type="string", example="Bandung", description="Location"),
     *  @SWG\Property(property="education_level", type="string", example="SMA", description="SMA,SMK"),
     *  @SWG\Property(property="education_school", type="string", example="SMAN 12 Bandung", description="Name of school"),
     *  @SWG\Property(property="education_focus", type="string", example="IPA ", description="Jurusan Sekolah"),
     *  @SWG\Property(property="experience_position", type="string", example="System Admin ", description="Position"),
     *  @SWG\Property(property="experience_company", type="string", example="PT. Kerjaku ", description="Company"),
     *  @SWG\Property(property="experience_industry", type="string", example="Human Resource ", description="Industry"),
     *  @SWG\Property(property="experience_start", type="string", example="2016-03-1 ", description="Start Work"),
     *  @SWG\Property(property="experience_end", type="string", example="2017-03-1 ", description="End Work"),
     *  @SWG\Property(property="status", type="numeric", example="0", description="Status Post"),
	* @SWG\Property(property="last_position", type="string", example="System Administrator"),
	*    )
    * @SWG\Definition(definition="Resumes",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/ResumesData"),
    *   }
     * )
     * @SWG\Definition(definition="ResumesData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/Resume")
     *  )
     * )
     * @SWG\Definition(definition="LimitOffset",
     *  @SWG\Property(property="o", type="integer", example="0", description="Offset Data"),
     *  @SWG\Property(property="l", type="integer", example="10", description="Limit Data"),
     * )
    * @SWG\Definition(definition="Inboxes",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/InboxesData"),
    *   }
     * )
     * @SWG\Definition(definition="InboxesData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/Inbox")
     *  )
     * )
     * @SWG\Definition(definition="Inbox",
     * @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="ID Inbox"),
     * @SWG\Property(property="client_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="Client ID"),
     * @SWG\Property(property="client_name", type="string", example="Ulfi", description="Client Name"),
     * @SWG\Property(property="user_id", type="string", example="Ulfi", description="User ID"),
     * @SWG\Property(property="user_name", type="string", example="Ulfi", description="User Name"),
     * @SWG\Property(property="message_date", type="string", example="2017-11-11 10:00:00", description="Message Date"),
     * @SWG\Property(property="message", type="string", example="Hello World", description="Message "),
     * @SWG\Property(property="sender", type="numeric", example="0", description="0=Client, 1=User "),
     * @SWG\Property(property="company", type="string", example="PT. Kerjaku", description="Company Name "),
     *)
     * @SWG\Definition(definition="InboxCreate",
     * @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="ID Inbox"),
     * @SWG\Property(property="client_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="Client ID"),
     * @SWG\Property(property="user_id", type="string", example="Ulfi", description="User ID"),
     * @SWG\Property(property="message_date", type="string", example="2017-11-11 10:00:00", description="Message Date"),
     * @SWG\Property(property="message_text", type="string", example="Hello World", description="Message ")
     *)
     * @SWG\Definition(definition="InboxUpdate",
     * @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="ID Inbox"),
     * @SWG\Property(property="client_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="Client ID"),
     * @SWG\Property(property="user_id", type="string", example="Ulfi", description="User ID"),
     * @SWG\Property(property="message_date", type="string", example="2017-11-11 10:00:00", description="Message Date"),
     * @SWG\Property(property="message", type="string", example="Hallo World", description="Message ")
     *)
     * @SWG\Definition(definition="InboxDelete",
     * @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="ID Inbox")
     *)
     * @SWG\Definition(definition="NewsLikesCreate",
     * 	@SWG\Property(property="news_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="ID News"),
     *  )
     * )
     * @SWG\Definition(definition="NewsCommentsCreate",
     * 	@SWG\Property(property="news_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="ID News"),
     * 	@SWG\Property(property="comment", type="string", example="This is Comment", description="News Comment"),
     *  )
     * )
     * @SWG\Definition(definition="ClientProfileUpdate",
	 * @SWG\Property(property="name", type="string", example="Achmad Ulfi M.S."),
	 * @SWG\Property(property="email", type="string", example="ulfims@gmail.com"),
	 * @SWG\Property(property="phone", type="string", example="0812345678"),
	 * @SWG\Property(property="company", type="string", example="PT. Kerjaku"),
	 * @SWG\Property(property="company_description", type="string", example="Mencari kerja menjadi mudah"),
	 * @SWG\Property(property="industry_id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0,518cb7fe-c9bf-11e7-b626-5254005c6ff0",  description="ID Industri (pisah menggunakan koma)"),
	 * @SWG\Property(property="address", type="string", example="Alamat Perusahaan"),
	 * @SWG\Property(property="post_code", type="string", example="Kode pos "),
	 * @SWG\Property(property="location", type="string", example="Location "),
	 * @SWG\Property(property="company_phone", type="string", example="Company  phone"),
	 * @SWG\Property(property="company_website", type="string", example="Company  website"),
	 * @SWG\Property(property="npwp_name", type="string", example="Nama NPWP"),
	 * @SWG\Property(property="npwp", type="string", example="NPWP"),
	 * @SWG\Property(property="npwp_location", type="string", example="NPWP Location"),
	 * @SWG\Property(property="npwp_phone", type="string", example="NPWP Phone"),
	 * @SWG\Property(property="npwp_address", type="string", example="NPWP Address"),
	 * @SWG\Property(property="facebook", type="string", example="@ulfims"),
	 * @SWG\Property(property="instagram", type="string", example="@ulfims"),
	 *
	 * )
     * @SWG\Definition(definition="ImagePng",
	 * 	@SWG\Property(
	 * 		property="image", type="binary",
	 * 	),
	 * )
     * @SWG\Definition(definition="JobTemplatesUpdateData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/JobTemplateUpdate")
     *  )
     * )
     * @SWG\Definition(definition="JobTemplateUpdate",
     *  @SWG\Property(property="name", type="string", example="System Administrator", description=""),
     * )
     * @SWG\Definition(definition="ClientJobTemplatesUpdateData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/ClientJobTemplateUpdate")
     *  )
     * )
     * @SWG\Definition(definition="ClientJobTemplateUpdate",
     *  ref="#/definitions/ParameterId")
     * )
     * @SWG\Definition(definition="IndustriesUpdateData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/IndustryUpdate")
     *  )
     * )
     * @SWG\Definition(definition="IndustryUpdate",
     *  @SWG\Property(property="name", type="string", example="Goverment", description=""),
     * )

  * @SWG\Definition(
  *   definition="SeekersStatusUpdate",
  *   allOf={
	  *    @SWG\Schema(required={"id"}, type="string",
	  *         @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0",description="Post ID")
	  *    ),
  *    		@SWG\Schema(ref="#/definitions/SeekersStatusUpdateLists"),
  *   }
  *  )
     * @SWG\Definition(definition="SeekersStatusUpdateLists",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/SeekerStatusUpdate")
     *  )
     * )
     * @SWG\Definition(definition="SeekerStatusUpdate",
     *  @SWG\Property(property="id", type="string", example="23434242-23424-2342bf-23ab-2323", description=""),
     *  @SWG\Property(property="status", type="numeric", example="0", description="0: Not Selected,1:Selected,2:Save"),
     * )
   * @SWG\Definition(definition="MemberLostPassword",
   * @SWG\Property(property="msisdn", type="string", example="08170970468", description="Number need reset"),
    * )
   * @SWG\Definition(definition="MemberLostPasswordVerification",
   * @SWG\Property(property="msisdn", type="string", example="08170970468", description="Number need reset"),
   * @SWG\Property(property="code", type="string", example="82831", description="Verification Code"),
    * )

  * @SWG\Definition(
  *   definition="LostPasswordVerifyResponse",
  *   allOf={
  *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
  *    @SWG\Schema(required={"data"}, type="object",
  *       @SWG\Property(property="data",type="object",
  *         @SWG\Property(property="key", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0")
  *       )
  *    )
  *   }
  * )
   * @SWG\Definition(definition="MemberLostPasswordChange",
   * @SWG\Property(property="msisdn", type="string", example="08170970468", description="Number need reset"),
   * @SWG\Property(property="key", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="Lost Password Key"),
   * @SWG\Property(property="password", type="string", example="423423423-fvsdfv3-23434345sdfsljdfhsldfjhlsdfg", description="SHA512 format"),
    * )
   * @SWG\Definition(definition="ClientLostPassword",
   * @SWG\Property(property="email", type="string", example="email@saya.com", description="Email need reset"),
    * )
 * @SWG\Definition(definition="MemberProfileUpdate",
 * @SWG\Property(property="home_phone", type="string", example="02212345678"),
 * @SWG\Property(property="email", type="string", example="ulfims@gmail.com"),
 * @SWG\Property(property="name", type="string", example="Achmad Ulfi M.S."),
 * @SWG\Property(property="birth_date", type="string", example="1969-10-01"),
 * @SWG\Property(property="sex", type="string", example="M"),
 * @SWG\Property(property="height", type="numeric", example="160"),
 * @SWG\Property(property="weight", type="numeric", example="170"),
 * @SWG\Property(property="religion", type="string", example="Islam"),
 * @SWG\Property(property="address", type="string", example="Jl. Soekarno Hatta no 74"),
 * @SWG\Property(property="location", type="string", example="Bandung"),
 * @SWG\Property(property="education_level", type="string", example="S2"),
 * @SWG\Property(property="education_focus", type="string", example="IT"),
 * @SWG\Property(property="education_name", type="string", example="ITB"),
 * @SWG\Property(property="education_year", type="numeric", example="1994"),
 * @SWG\Property(property="willing_shift", type="numeric", example="1" ,description="1=Yes,0=No"),
 * @SWG\Property(property="job_type", type="string", example="PT" ,description="PT=Part Time,FT=Full Time, AL=All"),
 * @SWG\Property(property="job_locations", type="string", example="Bandung, Jakarta"),
 * @SWG\Property(property="current_salary_min", type="numeric", example="1000000"),
 * @SWG\Property(property="current_salary_max", type="numeric", example="5000000"),
 * @SWG\Property(property="expected_salary_min", type="numeric", example="1000000"),
 * @SWG\Property(property="expected_salary_max", type="numeric", example="5000000"),
 * @SWG\Property(property="last_position", type="string", example="System Administrator"),
  * )
 * @SWG\Definition(definition="MemberProfile",
 * @SWG\Property(property="phone", type="string", example="02212345678"),
 * @SWG\Property(property="home_phone", type="string", example="02212345678"),
 * @SWG\Property(property="email", type="string", example="ulfims@gmail.com"),
 * @SWG\Property(property="name", type="string", example="Achmad Ulfi M.S."),
 * @SWG\Property(property="birth_date", type="string", example="1969-10-01"),
 * @SWG\Property(property="sex", type="string", example="M"),
 * @SWG\Property(property="height", type="numeric", example="160"),
 * @SWG\Property(property="weight", type="numeric", example="170"),
 * @SWG\Property(property="religion", type="string", example="Islam"),
 * @SWG\Property(property="address", type="string", example="Jl. Soekarno Hatta no 74"),
 * @SWG\Property(property="location", type="string", example="Bandung"),
 * @SWG\Property(property="education_level", type="string", example="S2"),
 * @SWG\Property(property="education_focus", type="string", example="IT"),
 * @SWG\Property(property="education_name", type="string", example="ITB"),
 * @SWG\Property(property="education_year", type="numeric", example="1994"),
 * @SWG\Property(property="willing_shift", type="numeric", example="1" ,description="1=Yes,0=No"),
 * @SWG\Property(property="job_type", type="string", example="PT" ,description="PT=Part Time,FT=Full Time, AL=All"),
 * @SWG\Property(property="job_locations", type="string", example="Bandung, Jakarta"),
 * @SWG\Property(property="current_salary_min", type="numeric", example="1000000"),
 * @SWG\Property(property="current_salary_max", type="numeric", example="5000000"),
 * @SWG\Property(property="expected_salary_min", type="numeric", example="1000000"),
 * @SWG\Property(property="expected_salary_max", type="numeric", example="5000000"),
* @SWG\Property(property="last_position", type="string", example="System Administrator"),
   * )
  * @SWG\Definition(
  *   definition="ResponseApiName",
  *   allOf={
  *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
  *    @SWG\Schema(required={"data"}, type="object",
  *       @SWG\Property(property="data",type="object",
  *         @SWG\Property(property="name", type="string", example="My Name")
  *       )
  *    )
  *   }
  * )

  * @SWG\Definition(
  *   definition="PostPopulers",
  *   allOf={
  *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
  *    @SWG\Schema(ref="#/definitions/PostPopulerData"),
  *   }
  * )
     * @SWG\Definition(definition="PostPopulerData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/PostPopuler")
     *  )
     * ) 
     * @SWG\Definition(definition="PostPopuler",
 *    @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0"),
 *    @SWG\Property(property="name", type="string", example="System Administrator"),
 *    @SWG\Property(property="count", type="numeric", example="10"),
 *    @SWG\Property(property="updated_at", type="string", example="2017-12-27 10:11:12"),
 * )
 * @SWG\Definition(definition="PostDetail",
 *    @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0"),
 * )
  * @SWG\Definition(
  *   definition="PageResponse",
  *   allOf={
  *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
  *    @SWG\Schema(ref="#/definitions/PageData"),
  *   }
  * )
     * @SWG\Definition(definition="PageData",
     *   @SWG\Property(property="data", type="object",
 *    @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0"),
 *    @SWG\Property(property="title", type="string", example="Judul Halaman"),
 *    @SWG\Property(property="content", type="numeric", example="Content  Data"),
     *  )
     *)     
     * 
     * @SWG\Definition(definition="Page",
 *    @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0"),
 *    @SWG\Property(property="title", type="string", example="Judul Halaman"),
 *    @SWG\Property(property="content", type="numeric", example="Content  Data"),
 * )
 *
    * @SWG\Definition(definition="EducationFocus",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/EducationFocusData"),
    *   }
     * )
     * @SWG\Definition(definition="EducationFocusData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/EducationFocusModel")
     *  )
     * )
     * 
     * @SWG\Definition(definition="EducationFocusModel",
	 *    @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0"),
	 *    @SWG\Property(property="level", type="string", example="SMK"),
	 *    @SWG\Property(property="name", type="string", example="ARSITEKTUR"),
     *  )
     *)     
    * @SWG\Definition(definition="PostStatusUpdate",
    * @SWG\Property(property="id", type="string", example="518cb7fe-c9bf-11e7-b626-5254005c6ff0", description="ID Post"),
    * @SWG\Property(property="status", type="numeric", example="1", description="0=Draft,1=publish,2=Unpublish"),
    * )
    * @SWG\Definition(definition="Banners",
    *   allOf={
    *    @SWG\Schema(ref="#/definitions/ResponseApiTemplate"),
    *    @SWG\Schema(ref="#/definitions/BannersData"),
    *   }
     * )
     * @SWG\Definition(definition="BannersData",
     *   @SWG\Property(property="data", type="array",
     *       @SWG\Items(ref="#/definitions/BannerDetail")
     *  )
     * )    * @SWG\Definition(definition="BannerDetail",
    *   @SWG\Property(property="id", type="string", example="after_login", description="ID Banner"),
    * )

*/
