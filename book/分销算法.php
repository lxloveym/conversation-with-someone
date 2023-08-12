protected $uid = 2;
    protected $touid = 3;
    public function index()
    {
        echo hexdec("10");
        //推荐设置
        if ($this->uid != 1){

            $bids = Db::table("category")
                ->where("did",$this->uid)
                ->where("cid","0")
                ->order("bid","desc")
                ->find();//找到目前分享用户分享的所有用户中的最大排序数据
            var_dump($bids);

            if ($bids != null){
                if ($bids['bid'] + 1 <= 3){
                    $aid = Db::table('category')
                        ->where("id",$this->uid)
                        ->field("did");//获取上一个人的推荐————属于上一个人的间推

                    $bid = $bids['bid'] + 1;
                    Db::table("category")
                        ->where("id",$this->touid)//用户直推的
                        ->where("cid","<>","1")//判断过的不再判断
                        ->save(["aid" => $aid,"bid" => $bid,"cid" => "1","did" => $this->uid]);//设置上一个人的间推和推荐用户的直推
                }else{
                    //已经满三个了————节点更换
                    echo "不可再分享";
//                Db::table("category")
//                    ->where("id",$this->touid)//用户直推的
//                    ->where("cid","<>","1")//判断过的不再判断
//                    ->save(["aid" => "0","bid" => "1","cid" => "1","did" => $this->uid]);//设置上一个人的间推和推荐用户的直推
                }
            }else{
                echo "数据为空";
            }

        }else{
            Db::table("category")
                ->where("id",$this->touid)//用户直推的
                ->save(["aid" => "0","bid" => "0","cid" => "1","did" => $this->uid]);
        }
    }
