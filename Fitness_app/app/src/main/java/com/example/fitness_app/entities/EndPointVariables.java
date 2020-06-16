package com.example.fitness_app.entities;

public class EndPointVariables {

    static int regimeId;

    public static int getRegimeId() {
        return regimeId;
    }

    public static void setRegimeId(int regimeId) {
        EndPointVariables.regimeId = regimeId;
    }

    static int ExerciseeId;

    public static int getExerciseeId() {
        return ExerciseeId;
    }

    public static void setExerciseeId(int exerciseeId) {
        ExerciseeId = exerciseeId;
    }
}
