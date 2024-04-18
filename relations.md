# Skillharbor Relationships

## Assessment 
    public function jcp()
    {
        return $this->hasMany(jcp::class, 'assessment_id');

    }

## Category 

     public function skills()
    {
     return $this->hasMany(skill::class, 'skill_category_id');
    }

## Enrollment 
      public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assessment()
    {
        return $this->belongsTo(assessment::class);
    }

## JCPs
    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assessment()
    {
        return $this->belongsTo(assessment::class, 'assessment_id');
    }
    public function skills()
    {
        return $this->belongsToMany(skill::class)->withPivot('user_rating', 'supervisor_rating');
    }

    public function qualifications(){
        return $this->belongsToMany(qualification::class, 'jcp_qualification');

    }


## Qualification 
       public function jcp()
    {
    return $this->belongsToMany(jcp::class, 'jcp_qualification');
    }
    public function user()
    {
        return $this->belongsToMany(User::class, 'qualification_user');
    }


## Skills
    public function jcps()
    {
        return $this->belongsToMany(jcp::class)->withPivot('user_rating', 'supervisor_rating');
    }
