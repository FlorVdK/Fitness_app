package com.example.fitness_app.entities;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class Regime implements Comparable<Regime> {

    int id;
    String description;
    int sets;
    String trainee_comment;
    String coach_comment;
    int completion;



    String execution_date;

    int coach_has_trainees_id;
    int exercises_id;

    String exercise_name;

    public String getExercise_name() {
        return exercise_name;
    }

    public void setExercise_name(String exercise_name) {
        this.exercise_name = exercise_name;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getDescription() {
        if (description == null){
            description ="/";
        }
          return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public int getSets() {
        return sets;
    }

    public void setSets(int sets) {
        this.sets = sets;
    }

    public String getTrainee_comment() {
        if (trainee_comment == null){
            trainee_comment ="/";
        }
        return trainee_comment;
    }

    public void setTrainee_comment(String trainee_comment) {
        this.trainee_comment = trainee_comment;
    }

    public String getCoach_comment() {
        if (coach_comment == null){
            coach_comment ="/";
        }
        return coach_comment;
    }

    public void setCoach_comment(String coach_comment) {
        this.coach_comment = coach_comment;
    }

    public int getCompletion() {
        return completion;
    }

    public void setCompletion(int completion) {
        this.completion = completion;
    }

    public String getExecution_date() {
        return execution_date;
    }

    public void setExecution_date(String execution_date) throws ParseException {
        this.execution_date = execution_date;
    }

    public int getCoach_has_trainees_id() {
        return coach_has_trainees_id;
    }

    public void setCoach_has_trainees_id(int coach_has_trainees_id) {
        this.coach_has_trainees_id = coach_has_trainees_id;
    }

    public int getExercises_id() {
        return exercises_id;
    }

    public void setExercises_id(int exercises_id) {
        this.exercises_id = exercises_id;
    }

    @Override
    public int compareTo(Regime r) {
        return getExecution_date().compareTo(r.getExecution_date());
    }
}
